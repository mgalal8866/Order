<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\conversion;
use App\Events\MessageSent;
use App\Models\notifiction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\PrivetMessage;
use App\Models\ProductHeader;
use App\Models\DeliveryHeader;
use App\Models\ProductDetails;
use App\Http\Livewire\Testchat;
use App\Models\DeliveryDetails;
use App\Http\Livewire\Front\Otp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Dashboard\Chat;
use App\Http\Livewire\Front\Wishlist;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Front\Cart\Cart;
use Illuminate\Support\Facades\Config;
use App\Http\Livewire\Front\User\Login;
use App\Http\Livewire\Front\Product\Home;
use App\Http\Livewire\Front\Cart\Checkout;
use App\Http\Livewire\Front\User\Register;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\Front\Product\Offers;
use App\Http\Livewire\Dashboard\Units\Units;
use App\Http\Livewire\Dashboard\Users\Users;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Dashboard\Units\EditUnit;
use App\Http\Livewire\Front\Order\Ordersuccess;
use App\Http\Livewire\Front\Order\Ordertraking;
use App\Http\Livewire\Front\User\Userdashborad;
use App\Http\Livewire\Dashboard\Slider\EditSlider;
use App\Http\Livewire\Dashboard\Slider\ViewSlider;
use App\Http\Livewire\Front\Product\Searchproduct;
use App\Http\Livewire\Dashboard\Product\EditProduct;
use App\Http\Livewire\Dashboard\Product\ViewProduct;
use App\Http\Livewire\Dashboard\Invoice\ViewInvoopen;
use App\Http\Livewire\Dashboard\Category\EditCategory;
use App\Http\Livewire\Dashboard\Category\ViewCategory;
use App\Http\Livewire\Dashboard\Invoice\ViewInvoclose;
use App\Http\Controllers\Dashborad\UserAdminController;
use App\Http\Livewire\Dashboard\Invoice\ViewInvodetails;
use App\Http\Livewire\Dashboard\Invoice\ViewInvodetailsopen;
use App\Http\Livewire\Dashboard\Notification\ViewNotification;
use App\Http\Livewire\Front\Category\Viewcategory as CategoryViewcategory;
use App\Models\UserDelivery;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// php artisan migrate --path=database/migrations/system --database=mysql


Route::get('send-message',  function () {

    // event(new MessageSent('hello world'));
    event(new PrivetMessage('hello world'));

    return ['success' => true];
});
Route::domain(env('CENTERAL_DOMAIN','order-bay.com'))->group(
    function () {
        Route::get('/', function () {

            return view('main-domin.index');
        })->name('maindomin');

});


Route::get('/deletetable', function (Request $request) {
    $file = new Filesystem;
    $file->cleanDirectory('public/asset/images/products/');
    // DB::statement("SET foreign_key_checks=0");
    // ProductHeader::truncate();
    // ProductDetails::truncate();
    // DB::statement("SET foreign_key_checks=1");
});
Route::get('/send-fsm', function (Request $request) {
    $d = User::where('fsm', '!=', null)->pluck('fsm');
    notificationFCM('Hello', 'Okay', $d);
});
Route::get('/userdelivery', function (Request $request) {
    UserAdmin::create([
        'username' => 'admin',
        'password' => Hash::make('admin1234')
    ]);
});
Route::post('/store-token', function (Request $request) {
    Auth::guard('admin')->user()->update(['fsm' => $request->token]);
    // Auth::guard('client')->user()->update(['fsm' => $request->token]);
    return response()->json(['Token successfully stored.']);
})->name('store.token');


// Route::get('/moveToseleheader', function () {
//     DeliveryHeader::query()
//         ->where('id', '=', 1)
//         ->each(function ($oldRecord) {
//             $newRecord = $oldRecord->replicate();
//             $newRecord->setTable('sales_headers');
//             $newRecord->save();
//             $oldRecord->delete();
//         });
//     DeliveryDetails::query()
//         ->where('sale_header_id', '=', 1)
//         ->each(function ($oldRecord) {
//             $newRecord = $oldRecord->replicate();
//             $newRecord->setTable('sales_details');
//             $newRecord->save();
//             $oldRecord->delete();
//         });
// });

#####################################################
#################### FRONT Client #####################

Route::middleware('tenant')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/product/search', Searchproduct::class)->name('searchproduct');
    Route::get('/products/offers', Offers::class)->name('offerproduct');
    Route::get('/category/{categoryid?}', CategoryViewcategory::class)->name('categoryproduct');

    #################### guest Client #####################
    Route::middleware('guest:client')->group(function () {
        Route::get('/login', Login::class)->name('frontlogin');
        Route::get('/sign-up', Register::class)->name('signup');
        Route::get('/otp', Otp::class)->name('otp');
    });
    #################### auth Client #####################
    Route::middleware('auth:client')->group(function () {
        Route::post('/logout', [UserAdminController::class, 'clientlogout'])->name('clientlogout');
        Route::get('/wishlist', Wishlist::class)->name('wishlist');
        Route::get('/cart', Cart::class)->name('cart');
        Route::get('/cart/checkout', Checkout::class)->name('checkout');
        Route::get('/user/dashboard', Userdashborad::class)->name('userdashborad');
        Route::get('/order/traking', Ordertraking::class)->name('ordertraking');
        Route::get('/order/success', Ordersuccess::class)->name('ordersuccess');
    });
    #################### FRONT Client #####################
    #####################################################

    ########################################    #############
    #################### Dashboard  #####################
    Route::prefix('admin/dashborad')->middleware('guest:admin')->group(function () {
        Route::get('/login', [UserAdminController::class, 'login'])->name('dashlogin');
        Route::post('/postlogin', [UserAdminController::class, 'postlogin'])->name('postlogin');
    });
    Route::prefix('admin/dashborad')->middleware('auth:admin')->group(function () {
        Route::get('/', ViewProduct::class)->name('dashboard');
        Route::get('/chatlive', Testchat::class)->name('chatlive');
        // Route::get('product', CreateProduct::class)->name('product');

        Route::get('/chat', Chat::class);
        Route::get('users', Users::class)->name('viewusers');
        Route::get('categorys', ViewCategory::class)->name('categorys');
        Route::get('category/edit/{id}', EditCategory::class)->name('category');
        Route::get('products', ViewProduct::class)->name('products');
        Route::get('notifiction', ViewNotification::class)->name('notifiction');
        Route::get('product/edit/{id}', EditProduct::class)->name('product');
        Route::get('invoices/open', ViewInvoopen::class)->name('invoices_open');
        Route::get('invoices/close', ViewInvoclose::class)->name('invoices_close');
        Route::get('invoices-close/details/{id}', ViewInvodetails::class)->name('invodetails-close');
        Route::get('invoices-open/details/{id}', ViewInvodetailsopen::class)->name('invodetails-open');
        Route::get('sliders', ViewSlider::class)->name('sliders');
        Route::get('slider/edit/{id}', EditSlider::class)->name('slider');
        Route::get('unit/edit/{id}', EditUnit::class)->name('unit');
        Route::get('units', Units::class)->name('units');
        Route::post('/logout', [UserAdminController::class, 'adminlogout'])->name('adminlogout');
    });
    #################### Dashboard  #####################
    #####################################################
});
