<?php

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SyncController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\CitiesController;
use App\Http\Controllers\Api\V1\RegionController;
use App\Http\Controllers\Api\V1\CateoryAppController;
use App\Http\Controllers\Api\V1\ProductHeaderController;
use App\Http\Controllers\Api\V1\SliderController;
use App\Http\Controllers\Api\V1\WishlistController;
use App\Http\Controllers\Api\V1\CouponController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\SalesDetailsController;
use App\Http\Controllers\Api\V1\UnitController;
use App\Models\ProductHeader;

################# Start Login & Register #############
Route::post('/login',   [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
################# End   Login & Register #############

################# Start Category App #############
Route::get('/get_category_app', [CateoryAppController::class, 'getcategoryapp']);
################# End Category App   #############

################# Start Slider #############
Route::get('/getslider', [SliderController::class, 'getslider']);
Route::post('/add/slider', [SliderController::class, 'addslider']);
################## End Slider  #############

################# Start City & Region #############
Route::get('/getcity', [CitiesController::class, 'getcity']);
Route::get('/getregion/{id}', [RegionController::class, 'getregionbycity']);
################# End City & Region   #############

Route::middleware(['jwt.verify'])->group(function () {
    ################# Start product   #############
    Route::prefix('product')->group(function () {
        Route::get('/getproductbycat/{id?}', [ProductHeaderController::class, 'getproductbycat']);
    });
    #################   End product   #############

    #################   Start Wishlist #############
    Route::get('wishlist', [WishlistController::class, 'getwishlist']);
    Route::get('addwishlist/{id?}', [WishlistController::class, 'addwishlist']);
    Route::get('delete/wishlist/{id?}', [WishlistController::class, 'deletewishlist']);
    #################   End Wishlist   #############

    #################   Start Cart #############
    Route::get('getcart', [CartController::class, 'getcart']);
    Route::get('add/cart/{proudct_id?}/{qty?}', [CartController::class, 'addtocart']);
    Route::get('delete/cart/{cart_id?}', [CartController::class, 'deletefromcart']);
    Route::get('apply/deferred', [CartController::class, 'applydeferred']);
    #################   End Cart   #############
    #################   Start Orderplase #############
    Route::post('order/plase', [SalesDetailsController::class, 'orderplase']);
    #################   End Orderplase   #############
    #################   Start Coupon #############
    Route::get('checkcoupon/{code?}', [CouponController::class, 'checkcoupon']);
    #################   End Coupon   #############


    #################   start  category product #############
    Route::get('getcategory', [CategoryController::class, 'getcategory']);
    #################   End  category product   #############

    #################   Start  category product   #############
    Route::prefix('unit')->group(function () {
        Route::get('getunit', [UnitController::class, 'getunit']);
    });
    #################   End  category product   #############

    Route::get('/logout',    [UserController::class, 'logout'])->name('logout');
});




#################   Start SYNC  #############
Route::prefix('sync')->group(function () {
    Route::post('/client',       [SyncController::class, 'client']);
    Route::get('/clientget',       [SyncController::class, 'clienttest']);
    Route::get('/category_app', [SyncController::class, 'categoryapp']);
});
#################   End  SYNC   #############
