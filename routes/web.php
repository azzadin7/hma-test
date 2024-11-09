<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() { return view('login'); })->name('get.login');

Route::post('/login', [AuthController::class, 'login'])->name('post.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('post.logout');

Route::get('/dashboard', [MainController::class, 'index']);

Route::get('/getusers', [UserController::class, 'getUsers'])->name('view.user');

Route::get('/adduser', [UserController::class, 'addUserForm']);
Route::get('/edituser/{user}', [UserController::class, 'updateUserForm']);

Route::post('/adduser', [UserController::class, 'addUser'])->name('post.user');
Route::delete('/user/{user}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::put('/user/{user}', [UserController::class, 'updateUser'])->name('update.user');

Route::get('/config', [MainController::class, 'config']);
Route::post('/config', [MainController::class, 'updateConfig']);