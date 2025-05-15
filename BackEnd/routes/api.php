<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Register;


use App\Http\Controllers\NewsController;
use App\Http\Controllers\GameController;

use App\Http\Controllers\FileController;

Route::post('/auth',[Auth::class, 'auth']);
Route::get('/auth/verify',[Auth::class, 'verify']);

Route::post('/register', [Register::class, 'index']);

Route::post('/news', [NewsController::class, 'store']);
Route::get('/news', [NewsController::class, 'index']);

Route::delete('/news/{id}', [NewsController::class, 'destroy']);
Route::get('/news/show/{id}',[NewsController::class, 'show']);
Route::put('/news/update/{id}',[NewsController::class, 'update']);

// Games

Route::post('/upload', [FileController::class, 'upload']);
Route::get('/image/{filename}', function ($filename) {
    $path = storage_path('app/private/uploads/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file, 200)->header("Content-Type", $type);
});

Route::post('/jogo', [GameController::class, 'store']);
Route::get('/games',[GameController::class, 'index']);
Route::delete('/games/{id}', [GameController::class, 'destroy']);
Route::get('/games/show/{id}',[GameController::class, 'show']);
Route::put('/games/update/{id}',[GameController::class, 'update']);