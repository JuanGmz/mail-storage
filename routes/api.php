<?php
use App\Http\Controllers\Api\OwnersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\FuelTypesController;

Route::post('v1/register', [AuthController::class, 'register']);
Route::post('v1/login', [AuthController::class, 'login']);
Route::get('v1/activate/{user}', [AuthController::class, 'activate'])->name('activate')->middleware('signed');
Route::post('v1/resend-activation', [AuthController::class, 'resendActivation']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    
    Route::group(['middleware' => 'rol:user'], function () {
        Route::get('v1/fueltypes', [FuelTypesController::class, 'index']);
        Route::get('v1/fueltypes/{id}', [FuelTypesController::class, 'show']);
        Route::get('v1/owners', [UsersController::class, 'index']);
        Route::get('v1/owners/{id}', [UsersController::class, 'show']);
    });

    Route::group(['middleware' => ['rol:user,admin']], function () {
        Route::post('v1/profile-picture', [ImagesController::class, 'uploadImage']);
        Route::get('v1/profile-picture', [ImagesController::class, 'getImage']);
    });

    Route::group(['middleware' => 'rol:admin'], function () {
        Route::resource('v1/users', UsersController::class);
        Route::resource('v1/fueltypes', FuelTypesController::class);
        Route::resource('v1/owners', OwnersController::class);

        Route::put('v1/users-rol', [UsersController::class, 'updateRol']);
    });
});