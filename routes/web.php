<?php

use App\Models\User;
use App\Events\MessageSent;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Dashborad\UserAdminController;
use App\Http\Livewire\Dashboard\Category\EditCategory;
use App\Http\Livewire\Dashboard\Category\ViewCategory;
use App\Http\Livewire\Dashboard\Chat;
use App\Http\Livewire\Dashboard\Invoice\ViewInvoclose;
use App\Http\Livewire\Dashboard\Invoice\ViewInvodetails;
use App\Http\Livewire\Dashboard\Invoice\ViewInvodetailsopen;
use App\Http\Livewire\Dashboard\Invoice\ViewInvoopen;
use App\Http\Livewire\Dashboard\Notification\ViewNotification;
use App\Http\Livewire\Dashboard\Product\EditProduct;
use App\Http\Livewire\Dashboard\Product\ViewProduct;
use App\Http\Livewire\Dashboard\Slider\EditSlider;
use App\Http\Livewire\Dashboard\Slider\ViewSlider;
use App\Http\Livewire\Dashboard\Units\EditUnit;
use App\Http\Livewire\Dashboard\Units\Units;
use App\Http\Livewire\Dashboard\Users\Users;
use App\Http\Livewire\Front\Cart\Cart;
use App\Http\Livewire\Front\Otp;
use App\Http\Livewire\Front\Product\Home;
use App\Http\Livewire\Front\User\Login;
use App\Http\Livewire\Front\User\Register;
use App\Http\Livewire\Front\Wishlist;
use App\Models\DeliveryDetails;
use App\Models\DeliveryHeader;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
// Route::get('/vue', function () {
//     return view('Vue.app');
// })
// ->name('application');
// Route::get('messages', [MessageController::class],'fetchMessages');
// Route::post('messages', [MessageController::class],'sendMessage');
// Route::get('/', [MessageController::class,'index']);
// Route::post('send-message',  function (Request $request) {
//     event(new MessageSent($request->username,$request->message));
//     return ['success' => true];
// });

// Route::get('/sss', function (Request $request) {
//     $users = User::on('mysql')->get(); //الديسك توب
//     foreach ($users as $user) {
//         User::on('localmysql')->updateOrCreate(
//             ['id' => $user->id],
//             $user->toarray()
//         );
//     }
//     // return view('chat');
//     return Str::random(18);
// });

Route::get('/send-fsm', function (Request $request) {
    $d = Auth::user()->fsm;
    Log::alert(notificationFCM('Hello', 'Okay', [$d]));
});
Route::post('/store-token', function (Request $request) {
    //   UserAdmin::create([
    //     'username'=>'admin',
    //     'password'=> Hash::make('123456')
    //   ]);

    Auth::user()->update(['fsm' => $request->token]);
    return response()->json(['Token successfully stored.']);
})->name('store.token');

// Route::get('/sql', function (Request $request) {
//     DB::purge('mysql');
//     DB::purge('tenant');

//     Config::set('database.connections.sqlsrv.host', $request->ip ?? "DESKTOP-F8KF0NT\SQLEXPRESS");
//     Config::set('database.connections.sqlsrv.port', "1433");
//     Config::set('database.connections.sqlsrv.database',  $request->database ?? "DBOrder");
//     Config::set('database.connections.sqlsrv.username',  $request->username ?? "mgalal");
//     Config::set('database.connections.sqlsrv.password',  $request->password ?? "123456");
//     DB::reconnect('sqlsrv');
//     DB::setDefaultconnection('sqlsrv');
//     return User::all();
// });



Route::get('/moveToseleheader', function () {
    DeliveryHeader::query()
        ->where('id', '=', 1)
        ->each(function ($oldRecord) {
            $newRecord = $oldRecord->replicate();
            $newRecord->setTable('sales_headers');
            $newRecord->save();
            $oldRecord->delete();
        });
    DeliveryDetails::query()
        ->where('sale_header_id', '=', 1)
        ->each(function ($oldRecord) {
            $newRecord = $oldRecord->replicate();
            $newRecord->setTable('sales_details');
            $newRecord->save();
            $oldRecord->delete();
        });
});
#####################################################
#################### FRONT Client #####################
Route::get('/', Home::class)->name('home');
#################### guest Client #####################
Route::middleware('guest:client')->group(function () {
Route::get('/login', Login::class)->name('frontlogin');
Route::get('/sign-up',Register::class)->name('signup');
Route::get('/otp', Otp::class)->name('otp');
});
#################### auth Client #####################
Route::middleware('auth:client')->group(function () {
Route::get('/cart', Cart::class)->name('cart');
Route::post('/logout',[UserAdminController::class,'clientlogout'])->name('clientlogout');
Route::get('/wishlist', Wishlist::class)->name('wishlist');
});
#################### FRONT Client #####################
#####################################################

########################################    #############
#################### Dashboard  #####################
Route::prefix('admin/dashborad')->middleware('guest:admin')->group(function () {
    Route::get('/login', [UserAdminController::class,'login'])->name('dashlogin');
    Route::post('/postlogin', [UserAdminController::class,'postlogin'])->name('postlogin');
    // Auth::routes();
});
Route::prefix('admin/dashborad')->middleware('auth:admin')->group(function () {
    Route::get('/', ViewProduct::class)->name('dashboard');
    // Route::get('product', CreateProduct::class)->name('product');
    Route::get('chat', Chat::class)->name('chat');
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
    Route::post('/logout',[UserAdminController::class,'adminlogout'])->name('adminlogout');
});
#################### Dashboard  #####################
#####################################################

