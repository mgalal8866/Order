<?php

use App\Models\logsync;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\ChatController;
use App\Http\Controllers\Api\V1\SyncController;
use App\Http\Controllers\Api\V1\UnitController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\CitiesController;
use App\Http\Controllers\Api\V1\CouponController;
use App\Http\Controllers\Api\V1\RegionController;
use App\Http\Controllers\Api\V1\SliderController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\WishlistController;
use App\Http\Controllers\Api\V1\CateoryAppController;
use App\Http\Controllers\Api\V1\NotifictionController;
use App\Http\Controllers\Api\V1\UserDeliveryController;
use App\Http\Controllers\Api\V1\ProductHeaderController;
use App\Http\Controllers\Api\V1\ClientPaymentsController;

################# Start Login & Register #############
Route::post('/login',   [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/sendtoken/{token}', [UserController::class, 'sendtoken'])->name('sendtoken');
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
################# Chat #############
Route::post('/sentmessage', [ChatController::class, 'sentmessage']);
Route::get('/getmessage', [ChatController::class, 'getmessage']);
################# Chat #############

Route::middleware(['jwt.verify'])->group(function () {
    ################# Start product   #############
        Route::get('product/getproductbycat/{id?}', [ProductHeaderController::class, 'getproductbycat']);
        Route::get('product/offers', [ProductHeaderController::class, 'getoffers']);
        Route::get('product/search/{search}', [ProductHeaderController::class, 'searchproduct']);
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
    Route::post('order/plase', [InvoiceController::class, 'orderplase']);
    Route::post('order/comment', [CommentController::class, 'addcomment']);
    Route::get('order/getcloseinvo', [InvoiceController::class, 'getcloseinvo']);
    Route::get('order/getopeninvo', [InvoiceController::class, 'getopeninvo']);
    Route::get('order/closeinvo/details/{id?}', [InvoiceController::class, 'getcloseinvodetails']);
    Route::get('order/openinvo/details/{id?}', [InvoiceController::class, 'getopeninvoedetails']);
    #################   End Orderplase   #############

    #################   Start Coupon #############
    Route::get('checkcoupon/{code?}', [CouponController::class, 'checkcoupon']);
    Route::get('getcoupon', [CouponController::class, 'getall']);
    #################   End Coupon   #############

    #################   start  category product #############
    Route::get('getcategory', [CategoryController::class, 'getcategory']);
    #################   End  category product   #############
    #################   start  category product #############
    Route::get('client/notifiction', [NotifictionController::class, 'getnotifiction']);
    Route::get('client/payment', [ClientPaymentsController::class, 'getclientpayment']);
    #################   End  category product   #############
    #################   Start  category product   #############
    Route::prefix('unit')->group(function () {
        Route::get('getunit', [UnitController::class, 'getunit']);
    });
    #################   End  category product   #############

    Route::post('/user/edit',    [UserController::class, 'edit'])->name('edit');
    Route::get('/logout',    [UserController::class, 'logout'])->name('logout');
});


#################   Start SYNC  #############
Route::prefix('sync')->middleware(['MeasureResponseTime'])->group(function () {
    Route::post('/client',        [SyncController::class, 'client']);
    Route::post('/update/client', [SyncController::class, 'updateclient']);
    Route::post('/upload/products/header',[SyncController::class, 'uploadproductsheader']);
    Route::post('/upload/products/details',[SyncController::class, 'uploadproductsdetails']);
    Route::post('/upload/units',   [SyncController::class, 'uploadunits']);
    Route::post('/upload/category',[SyncController::class, 'uploadcategory']);
    Route::post('/upload/sales/header',[SyncController::class, 'uploadsalseheader']);
    Route::post('/upload/sales/details',[SyncController::class, 'uploadsalsedetails']);
    Route::post('/upload/delivery/header',[SyncController::class, 'uploadsdeliveryheader']);
    Route::post('/upload/delivery/details',[SyncController::class, 'uploaddeliverydetails']);
    Route::get('/down/delivery/header',[SyncController::class, 'downsdeliveryheader']);
    Route::get('/down/delivery/details',[SyncController::class, 'downdeliverydetails']);
    Route::get('/down/comments',[SyncController::class, 'downcomment']);
    Route::post('/upload/slider',[SyncController::class, 'uploadslider']);
    Route::get('/delete/slider/{id?}',[SyncController::class, 'deleteslider']);
    Route::get('/get/fsm_notification',[SyncController::class, 'getfsm_notification']);
    Route::post('/notification/send',[SyncController::class, 'sendnotification']);
    Route::post('/upload/coupon',[SyncController::class, 'uploadcoupon']);
    Route::post('/upload/emp',[SyncController::class, 'uploademp']);
    Route::post('/upload/categoryapp',[SyncController::class, 'uploadcategoryapp']);
    Route::post('/upload/user/delivery',[SyncController::class, 'uploaduser_deliveries']);
    // Route::get('/get/user/delivery',[SyncController::class, 'getuser_deliveries']);
    Route::get('/get/deferreds',[SyncController::class, 'get_deferreds']);
    Route::post('/upload/deferreds',[SyncController::class, 'upload_deferreds']);
    Route::post('/upload/jobs',[SyncController::class, 'upload_jobs']);
    Route::post('/upload/setting',[SyncController::class, 'upload_setting']);
    Route::post('/upload/stock',[SyncController::class, 'upload_stock']);
    Route::post('/upload/store',[SyncController::class, 'upload_store']);
    Route::post('/upload/attendance',[SyncController::class, 'upload_Attendance']);
    Route::post('/upload/banks',[SyncController::class, 'upload_banks']);
    Route::post('/upload/damage',[SyncController::class, 'upload_Damage']);
    Route::post('/upload/erolment_emps',[SyncController::class, 'upload_erolment_emps']);
    Route::get('/delete/sales/header/{id}',[SyncController::class, 'delete_selseheader']);
    Route::get('/delete/delivery/header/{id}',[SyncController::class, 'delete_deliveryheader']);
    Route::post('/upload/supplier/grups',[SyncController::class, 'upload_supplier_grups']);
    Route::post('/upload/second/offers',[SyncController::class, 'upload_second_offers']);
    Route::post('/upload/suppliers',[SyncController::class, 'upload_suppliers']);
    Route::post('/upload/purchase/headers',[SyncController::class, 'upload_purchase_headers']);
    Route::post('/upload/purchase/details',[SyncController::class, 'upload_purchase_details']);
    Route::post('/upload/movement/stock_details',[SyncController::class, 'upload_movement_stock_details']);
    Route::post('/upload/movement/stocks',[SyncController::class, 'upload_movement_stocks']);
    Route::post('/upload/supplier/payments',[SyncController::class, 'upload_supplier_payments']);

});
#################   End  SYNC   #############

Route::prefix('delivery')->middleware([])->group(function(){
    Route::post('/login',   [UserDeliveryController::class, 'login'])->name('login');
    Route::post('/register', [UserDeliveryController::class, 'register'])->name('register');
});
Route::prefix('delivery')->middleware(['jwt.verify'])->group(function(){
    Route::get('update/map',[UserDeliveryController::class,'updatemap']);
    Route::get('checkuser',[UserDeliveryController::class,'checkuser']);
    Route::get('order/getdeliverycloseinvo',[InvoiceController::class,'getdeliverycloseinvo']);
    Route::get('order/getdeliveryopeninvo', [InvoiceController::class, 'getdeliveryopeninvo']);
    Route::get('order/closeinvo/details/{id?}', [InvoiceController::class, 'getdeliverycloseinvodetails']);
    Route::get('order/openinvo/details/{id?}', [InvoiceController::class, 'getdeliveryopeninvoedetails']);
});

