<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SyncController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\CitiesController;
use App\Http\Controllers\Api\V1\RegionController;
use App\Http\Controllers\Api\V1\CateoryAppController;
use App\Http\Controllers\Api\V1\ProductHeaderController;
use App\Http\Controllers\UnitController;
use App\Models\ProductHeader;

Route::post('/login' ,   [UserController::class,'login'])->name('login');
Route::post('/register', [UserController::class,'register'])->name('register');

Route::get('/get_category_app', [CateoryAppController::class,'getcategoryapp']);

Route::get('/getcity', [CitiesController::class,'getcity']);
Route::get('/getregion/{id}', [RegionController::class,'getregionbycity']);

Route::middleware(['jwt.verify'])->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/getproductbycat/{id?}',[ProductHeaderController::class,'getproductbycat']);
    });

    Route::prefix('unit')->group(function () {
        Route::get('getunit',[UnitController::class,'getunit']);
    });

    Route::get('/logout' ,    [UserController::class,'logout'])->name('logout');
});




Route::prefix('sync')->group(function () {
    Route::post('/client' ,       [SyncController::class,'client']);
    Route::get('/clientget' ,       [SyncController::class,'clienttest']);
    Route::get('/category_app' , [SyncController::class,'categoryapp']);
});
