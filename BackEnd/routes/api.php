<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Register;
use App\Http\Controllers\NewsController;

Route::post('/auth',[Auth::class, 'auth']);
Route::get('/auth/verify',[Auth::class, 'verify']);

Route::post('/register', [Register::class, 'index']);

Route::post('/news', [NewsController::class, 'store']);
Route::get('/news', [NewsController::class, 'index']);

Route::delete('/news/{id}', [NewsController::class, 'destroy']);
