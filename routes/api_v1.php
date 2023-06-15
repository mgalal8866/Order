<?php

use App\Http\Controllers\Api\V1\CateoryAppController;
use App\Http\Controllers\Api\V1\SyncController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login' ,   [UserController::class,'login'])->name('login');
Route::post('/register', [UserController::class,'register'])->name('register');

Route::get('/get_category_app', [CateoryAppController::class,'getcategoryapp']);

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('/logout' ,    [UserController::class,'logout'])->name('logout');
});




Route::prefix('sync')->group(function () {
    Route::post('/client' ,       [SyncController::class,'client']);
    Route::get('/clientget' ,       [SyncController::class,'clienttest']);
    Route::get('/category_app' , [SyncController::class,'categoryapp']);
});
