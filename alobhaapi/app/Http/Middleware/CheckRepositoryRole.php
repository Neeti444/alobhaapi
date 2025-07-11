<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Repository;

class CheckRepositoryRole
{
    public function handle(Request $request, Closure $next, $role, $param = 'repositoryId')
    {
        $repositoryId = $request->route($param);
        $repository = Repository::findOrFail($repositoryId);
        $userId = auth()->id();
        $userRole = $repository->userRole($userId);
        $isOwner = $repository->user_id === $userId;

        if (
            $isOwner ||
            $userRole === $role ||
            ($role === 'read' && in_array($userRole, ['read', 'write', 'admin'])) ||
            ($role === 'write' && in_array($userRole, ['write', 'admin']))
        ) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
