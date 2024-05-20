<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MenuController;

Route::middleware('auth:sanctum')->get('/user', [App\Http\Controllers\Api\AuthController::class, 'userInfo']);
Route::get('/hey',function()
{
    return (['hey'=>'hey there']);
});
Route::post('/register', [App\Http\Controllers\Api\AuthController::class,'createUser']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class,'login']);


Route::prefix('menus')->group(function () {
    Route::get('/', [MenuController::class, 'index']);
    Route::post('/', [MenuController::class, 'store']);
    Route::get('/{id}', [MenuController::class, 'show']);
    Route::put('/{id}', [MenuController::class, 'update']);
    Route::delete('/{id}', [MenuController::class, 'destroy']);
});
Route::get('images/{filename}', function ($filename) {
    $path = public_path('images/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});