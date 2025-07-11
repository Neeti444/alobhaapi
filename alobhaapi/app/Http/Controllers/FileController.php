<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\File;
use App\Models\FileVersion;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{


public function upload(Request $request, $repositoryId)
{
    $request->validate([
        'name' => 'required|string',
        'file' => 'required|file'
    ]);

    $repository = Repository::findOrFail($repositoryId);
    $role = $repository->userRole(auth()->id());

    if (!in_array($role, ['write', 'admin']) && $repository->user_id !== auth()->id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    DB::beginTransaction();

    try {
        $file = File::where([
            'repository_id' => $repositoryId,
            'name' => $request->name
        ])->lockForUpdate()->first();

        if (!$file) {
            $file = File::create([
                'repository_id' => $repositoryId,
                'name' => $request->name
            ]);
        }

        $latestVersion = $file->versions()->max('version') ?? 0;
        $newVersion = $latestVersion + 1;

        $path = $request->file('file')->store("repository_{$repositoryId}/{$file->id}/v{$newVersion}");

        FileVersion::create([
            'file_id' => $file->id,
            'file_path' => $path,
            'version' => $newVersion
        ]);

        RepositoryLog::create([
            'repository_id' => $repositoryId,
            'user_id' => auth()->id(),
            'action' => 'file_upload',
            'details' => 'Uploaded version ' . $newVersion . ' of file: ' . $file->name
        ]);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'File uploaded successfully',
            'version' => $newVersion
        ]);

    } catch (\Throwable $e) {
        DB::rollBack();
        return response()->json([
            'status' => 'error',
            'message' => 'Upload failed or concurrent update detected.',
            'error' => $e->getMessage()
        ], 409); 
    }
}

public function searchFiles(Request $request)
{
    $query = $request->input('query');
    if (!$query) {
        return response()->json(['message' => 'Query required'], 400);
    }

    $userId = auth()->id();
    $repositoryIds = Repository::where('user_id', $userId)
        ->orWhereHas('users', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->pluck('id');

    $files = File::whereIn('repository_id', $repositoryIds)
        ->where('name', 'LIKE', "%{$query}%")
        ->with(['repository:id,name', 'versions' => function($q) {
            $q->latest()->limit(1);
        }])
        ->get();

    return response()->json([
        'status' => 'success',
        'query' => $query,
        'results' => $files
    ]);
}


    public function listFiles($repositoryId)
    {
        $repository = Repository::findOrFail($repositoryId);
        $role = $repository->userRole(auth()->id());
        if (!in_array($role, ['read', 'write', 'admin']) && $repository->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $files = $repository->files()->with('latestVersion')->get();

        return response()->json([
            'status' => 'success',
            'files' => $files
        ]);
    }

    public function download($fileId, $version)
    {
        $fileVersion = FileVersion::where('file_id', $fileId)
            ->where('version', $version)
            ->firstOrFail();

        $repository = $fileVersion->file->repository;
        $role = $repository->userRole(auth()->id());
        if (!in_array($role, ['read', 'write', 'admin']) && $repository->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return Storage::download($fileVersion->file_path);
    }

    public function versionHistory($fileId)
    {
        $file = File::with('versions')->findOrFail($fileId);
        $repository = $file->repository;
        $role = $repository->userRole(auth()->id());
        if (!in_array($role, ['read', 'write', 'admin']) && $repository->user_id !== auth()->id()) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'status' => 'success',
            'file' => [
                'id' => $file->id,
                'name' => $file->name,
                'versions' => $file->versions->map(function ($version) {
                    return [
                        'version' => $version->version,
                        'file_path' => $version->file_path,
                        'download_url' => url("/api/files/{$version->file_id}/versions/{$version->version}/download"),
                        'uploaded_at' => $version->created_at->toDateTimeString(),
                    ];
                }),
            ]
        ]);
    }


   

public function compareVersions(Request $request, $fileId)
{
    $request->validate([
        'v1' => 'required|integer',
        'v2' => 'required|integer'
    ]);

    $version1 = FileVersion::where('file_id', $fileId)->where('version', $request->v1)->firstOrFail();
    $version2 = FileVersion::where('file_id', $fileId)->where('version', $request->v2)->firstOrFail();

    $content1 = Storage::get($version1->file_path);
    $content2 = Storage::get($version2->file_path);

    return response()->json([
        'status' => 'success',
        'version1' => [
            'number' => $version1->version,
            'content' => $content1,
        ],
        'version2' => [
            'number' => $version2->version,
            'content' => $content2,
        ],
    ]);
}

public function preview($fileId)
{
    $file = File::findOrFail($fileId);
    $latestVersion = $file->versions()->latest('version')->first();

    $filePath = storage_path('app/' . $latestVersion->file_path);
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);

    if (in_array($extension, ['txt', 'md', 'json'])) {
        $content = file_get_contents($filePath);

        return response()->json([
            'status' => 'success',
            'preview' => $content
        ]);
    }

    return response()->json([
        'status' => 'success',
        'message' => "Preview not supported for .$extension files"
    ], 400);
}

}
