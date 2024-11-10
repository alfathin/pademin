<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/register', function () {
    return view('register');
});

Route::middleware('role:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/user_management', function () {
        return view('user_management');
    });

    Route::get('/admin_rooms', [RoomController::class, 'view']);
    Route::post('/admin_rooms', [RoomController::class, 'add']);
    Route::post('/edit_room/{id}', [RoomController::class, 'postEdit']);
    Route::post('/delete_room/{id}', [RoomController::class, 'delete']);
});
