<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\Monitoring;
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

Route::get('/profile', [UserController::class, 'userView']);
Route::post('/profile', [UserController::class, 'ubahPassword'])->name('profile');
Route::post('/edit_profile/{id}', [UserController::class, 'editProfile']);

Route::get('/rooms', [RoomController::class, 'userView']);
Route::get('/room/{id}', [RoomController::class, 'monitoring']);


Route::middleware('role:admin')->group(function () {

    Route::get('/admin_rooms', [RoomController::class, 'view']);
    Route::post('/admin_rooms', [RoomController::class, 'add']);
    Route::post('/edit_room/{id}', [RoomController::class, 'postEdit']);
    Route::post('/delete_room/{id}', [RoomController::class, 'delete']);

    Route::get('/admin_devices', [DeviceController::class, 'view']);
    Route::post('/admin_devices', [DeviceController::class, 'add']);
    Route::post('/edit_device/{id}', [DeviceController::class, 'postEdit']);
    Route::post('/delete_device/{id}', [DeviceController::class, 'delete']);

    Route::get('/admin_users', [UserController::class, 'view']);
    Route::post('/edit_user/{id}', [UserController::class, 'postEdit']);
    Route::post('/delete_user/{id}', [UserController::class, 'delete']);
    Route::post('/role_admin/{id}', [UserController::class, 'admin']);
    
    Route::get('/admin_dashboard', [MonitoringController::class, 'view']);
    Route::get('/admin_monitoring/{id}', [MonitoringController::class, 'viewMonitoring']);
    Route::post('/admin_monitoring/{id}', [MonitoringController::class, 'add']);

});
