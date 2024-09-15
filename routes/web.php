<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/roles-store', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');
    
});

