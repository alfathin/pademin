<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Beranda'
    ]);
});

Route::get('/login', function () {
    return view('login', [
        'title' => 'Masuk'
    ]);
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/register', function () {
    return view('register', [
        'title' => 'Daftar'
    ]);
});

Route::middleware('role:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    });
    Route::get('/user_management', function () {
        return view('user_management', [
            'title' => 'Kelola User'
        ]);
    });

    Route::get('/admin_rooms', [RoomController::class, 'view']);
    Route::post('/admin_rooms', [RoomController::class, 'add']);
    Route::post('/edit_room/{id}', [RoomController::class, 'postEdit']);
    Route::post('/delete_room/{id}', [RoomController::class, 'delete']);

    Route::get('/admin_devices', [DeviceController::class, 'view']);
    Route::post('/admin_devices', [DeviceController::class, 'add']);
    Route::post('/edit_device/{id}', [DeviceController::class, 'postEdit']);
    Route::post('/delete_device/{id}', [DeviceController::class, 'delete']);

});
