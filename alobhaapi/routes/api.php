<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FileController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RepositoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/information', [ApiController::class, 'index']);
Route::post('/information', [ApiController::class, 'store']);




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);





Route::middleware('auth:api')->group(function () {
    Route::get('/repositories', [RepositoryController::class, 'index']);      
    Route::post('/repositories', [RepositoryController::class, 'store']);      
    Route::put('/repositories/{id}', [RepositoryController::class, 'update']); 
    Route::delete('/repositories/{id}', [RepositoryController::class, 'destroy']); 
     Route::post('/repositories/{repositoryId}/invite', [RepositoryController::class, 'inviteUser']);

     
    
});






Route::middleware('auth:api')->group(function () {
    Route::post('/repositories/{repositoryId}/files/upload', [FileController::class, 'upload']);
    Route::get('/repositories/{repositoryId}/files', [FileController::class, 'listFiles']);
    Route::get('/files/{fileId}/versions/{version}/download', [FileController::class, 'download']);

    Route::get('/files/{fileId}/versions', [FileController::class, 'versionHistory']);
    Route::get('/files/{fileId}/compare', [FileController::class, 'compareVersions']);

});

Route::middleware('auth:api')->get('/repositories/{repositoryId}/logs', [RepositoryController::class, 'auditLog']);
Route::get('/repositories/{repositoryId}/logs', [RepositoryController::class, 'viewLogs']);
Route::get('/repositories/{repositoryId}/logs', [RepositoryController::class, 'viewAuditTrail']);
Route::middleware('auth:api')->get('/files/search', [FileController::class, 'searchFiles']);
Route::get('/files/{fileId}/preview', [FileController::class, 'preview']);



