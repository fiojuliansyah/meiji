<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welome');
})->name('index');
Route::get('/career-list', [GuestController::class, 'jobList'])->name('career-list');
Route::get('/career-detail/{id}', [GuestController::class, 'jobDetail'])->name('career-detail');
Route::post('/apply', [GuestController::class, 'applyCareer'])->name('apply-career');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware(['role:Super Admin']);

    Route::get('/roles', [RoleController::class, 'index' ])->name('roles')->middleware(['permission:role-list']);
    Route::post('/roles-store', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles-delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');


    Route::get('/user', [UserController::class, 'index'])->name('users');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::delete('/user/bulk-delete', [UserController::class, 'bulkDelete'])->name('user.bulk-delete');

    Route::get('/edit-profile/{id}', [UserController::class, 'viewProfile'])->name('edit.profile');
    Route::get('/myprofile', [UserController::class, 'myProfile'])->name('my.profile');
    Route::put('/account-update/{id}', [UserController::class, 'update'])->name('account.update');
    Route::put('/reset-password/{id}', [UserController::class, 'resetPassword'])->name('reset-password');

    Route::put('/profile-update/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/document-store', [ProfileController::class, 'storeDocument'])->name('document.store');
    Route::delete('/document-delete/{id}', [ProfileController::class, 'destroyDocument'])->name('document.delete');

    Route::get('/careers', [CareerController::class, 'index'])->name('careers.list');
    Route::post('/career-store', [CareerController::class, 'store'])->name('career.store');
    Route::put('/career-update/{id}', [CareerController::class, 'update'])->name('career.update');
    Route::delete('/career-delete/{id}', [CareerController::class, 'destroy'])->name('career.delete');
    Route::delete('/career/bulk-delete', [CareerController::class, 'bulkDelete'])->name('careers.bulk-delete');

    Route::get('/departement', [CareerController::class, 'departement'])->name('departement');
    Route::post('/departement-store', [CareerController::class, 'dptStore'])->name('departement.store');
    Route::put('/departement-update/{id}', [CareerController::class, 'dptUpdate'])->name('departement.update');
    Route::delete('/departement-delete/{id}', [CareerController::class, 'dptDelete'])->name('departement.delete');
    Route::delete('/departement/bulk-delete', [CareerController::class, 'dptBulkDelete'])->name('departements.bulk-delete');

    Route::get('/location', [CareerController::class, 'location'])->name('location');
    Route::post('/location-store', [CareerController::class, 'loctStore'])->name('location.store');
    Route::put('/location-update/{id}', [CareerController::class, 'loctUpdate'])->name('location.update');
    Route::delete('/location-delete/{id}', [CareerController::class, 'loctDelete'])->name('location.delete');
    Route::delete('/location/bulk-delete', [CareerController::class, 'loctBulkDelete'])->name('locations.bulk-delete');

    Route::get('/level', [CareerController::class, 'level'])->name('level');
    Route::post('/level-store', [CareerController::class, 'lvlStore'])->name('level.store');
    Route::put('/level-update/{id}', [CareerController::class, 'lvlUpdate'])->name('level.update');
    Route::delete('/level-delete/{id}', [CareerController::class, 'lvlDelete'])->name('level.delete');
    Route::delete('/level/bulk-delete', [CareerController::class, 'lvlBulkDelete'])->name('levels.bulk-delete');

    Route::get('/type', [CareerController::class, 'type'])->name('type');
    Route::post('/type-store', [CareerController::class, 'typeStore'])->name('type.store');
    Route::put('/type-update/{id}', [CareerController::class, 'typeUpdate'])->name('type.update');
    Route::delete('/type-delete/{id}', [CareerController::class, 'typeDelete'])->name('type.delete');
    Route::delete('/type/bulk-delete', [CareerController::class, 'typeBulkDelete'])->name('types.bulk-delete');
    
    Route::get('/status', [StatusController::class, 'index'])->name('status.index');
    Route::post('/status-store', [StatusController::class, 'store'])->name('status.store');
    Route::put('/status-update/{id}', [StatusController::class, 'update'])->name('status.update');
    Route::delete('/status-delete/{id}', [StatusController::class, 'destroy'])->name('status.delete');
    Route::delete('/status/bulk-delete', [StatusController::class, 'statusBulkDelete'])->name('statuses.bulk-delete');

    Route::get('/applicant', [ApplicantController::class, 'index'])->name('applicants');
    // Route::put('/type-update/{id}', [CareerController::class, 'typeUpdate'])->name('type.update');
    // Route::delete('/type-delete/{id}', [CareerController::class, 'typeDelete'])->name('type.delete');
    // Route::delete('/type/bulk-delete', [CareerController::class, 'typeBulkDelete'])->name('types.bulk-delete');

    
   
    
    
});

