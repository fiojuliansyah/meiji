<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/roles-store', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');


    Route::get('/user', [UserController::class, 'index'])->name('users');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::delete('/user/bulk-delete', [UserController::class, 'bulkDelete'])->name('user.bulk-delete');

});

