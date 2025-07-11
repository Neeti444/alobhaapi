<?php

namespace App\Http\Controllers;
use App\Models\User; 
use App\Models\Repository;
use App\Models\RepositoryLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepositoryController extends Controller
{

    
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:repositories,name,NULL,id,user_id,' . auth()->id(),
        ]);

        $repo = Repository::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Repository created',
            'data' => $repo
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:repositories,name,NULL,id,user_id,' . auth()->id(),
        ]);

        $repo = Repository::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $repo->update(['name' => $request->name]);

        return response()->json([
            'status' => 'success',
            'message' => 'Repository renamed',
            'data' => $repo
        ]);
    }

    public function destroy($id)
    {
        $repo = Repository::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $repo->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Repository deleted'
        ]);
    }

   


  public function inviteUser(Request $request, $repositoryId)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'role'  => 'required|in:read,write,admin'
    ]);

    $repository = Repository::findOrFail($repositoryId);

    $invitedUser = User::where('email', $request->email)->first();

    $repository->users()->syncWithoutDetaching([
        $invitedUser->id => ['role' => $request->role]
    ]);

    RepositoryLog::create([
    'repository_id' => $repository->id,
    'user_id' => auth()->id(),
    'action' => 'invite',
    'details' => 'Invited ' . $user->email . ' with role ' . $request->role,
]);

    

    return response()->json([
        'status' => 'success',
        'message' => 'User invited with role ' . $request->role
    ]);
}


public function auditLog($repositoryId)
{
    $logs = \App\Models\RepositoryLog::with('user')
        ->where('repository_id', $repositoryId)
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json([
        'status' => 'success',
        'data' => $logs
    ]);
}


public function viewLogs($repositoryId)
{
    $logs = RepositoryLog::where('repository_id', $repositoryId)->orderByDesc('created_at')->get();

    return response()->json([
        'status' => 'success',
        'data' => $logs
    ]);
}

public function viewAuditTrail($repositoryId)
{
    $logs = \App\Models\RepositoryLog::where('repository_id', $repositoryId)
        ->with('user:id,name,email')
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json([
        'status' => 'success',
        'logs' => $logs
    ]);
}

public function index()
{
   \App\Models\RepositoryLog::create([
        'repository_id' => 1,
        'user_id' => auth()->id(),
        'action' => 'test',
        'details' => 'Test log entry'
    ]);

    $repos = \App\Models\Repository::where('user_id', auth()->id())->get();

    return response()->json([
        'status' => 'success',
        'data' => $repos
    ]);
}

 

}

