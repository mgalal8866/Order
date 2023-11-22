<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\slider;
use App\Facade\Tenants;
use App\Imports\Client;
use App\Models\gallery;

use App\Models\setting;
use App\Models\Category;
use App\Models\UserAdmin;
use App\Models\CateoryApp;
use App\Models\notifiction;
use App\Http\Livewire\About;
use Illuminate\Http\Request;
use App\Models\ProductHeader;
use Illuminate\Http\Response;
use App\Models\DeliveryHeader;
use App\Models\ProductDetails;
use App\Http\Livewire\Testchat;
use App\Models\DeliveryDetails;
use App\Http\Livewire\Front\Otp;
use App\service\CheckimageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Livewire\Front\Wishlist;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Front\Cart\Cart;
use App\Http\Livewire\Front\Contactus;
use App\Http\Livewire\Front\User\Login;
use App\Http\Livewire\System\Dashboard;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\Dashboard\Settings;
use App\Http\Livewire\Front\Product\Home;
use App\Http\Livewire\Dashboard\Chat\Chat;
use App\Http\Livewire\Front\Cart\Checkout;
use App\Http\Livewire\Front\User\Register;
use App\Http\Livewire\Front\Product\Offers;

use App\Http\Livewire\Dashboard\Units\Units;
use App\Http\Livewire\Dashboard\Users\Users;
use App\Http\Livewire\Dashboard\Units\EditUnit;
use App\Http\Livewire\Front\Order\Ordersuccess;
use App\Http\Livewire\Front\Order\Ordertraking;
use App\Http\Livewire\Front\User\Userdashborad;
use App\Http\Livewire\Dashboard\Slider\EditSlider;
use App\Http\Livewire\Dashboard\Slider\ViewSlider;
use App\Http\Livewire\Front\Product\Searchproduct;
use App\Http\Livewire\Dashboard\Product\EditProduct;
use App\Http\Livewire\Dashboard\Product\ViewProduct;
use App\Http\Livewire\Front\Gallery as galleryfront;
use App\Http\Livewire\Dashboard\Invoice\ViewInvoopen;
use App\Http\Livewire\Dashboard\Category\EditCategory;
use App\Http\Livewire\Dashboard\Category\ViewCategory;
use App\Http\Livewire\Dashboard\Invoice\ViewInvoclose;
use App\Http\Controllers\Dashborad\UserAdminController;
use App\Http\Livewire\Dashboard\Gallery as galleryback;
use App\Http\Livewire\Dashboard\Invoice\ViewInvodetails;
use App\Http\Livewire\Dashboard\Reports\Pos\ShiftReport;
use App\Http\Livewire\Dashboard\Dashboard as mainDashboard;
use App\Http\Livewire\Dashboard\Reports\Client\ClientPayed;
use App\Http\Livewire\Dashboard\Reports\Employee\EmpReport;
use App\Http\Livewire\Dashboard\Reports\Employee\EmpSalery;
use App\Http\Livewire\Dashboard\Invoice\ViewInvodetailsopen;
use App\Http\Livewire\Dashboard\Reports\Client\ClientReport;

use App\Http\Livewire\Dashboard\Reports\Employee\EmpAdvance;
use App\Http\Livewire\Dashboard\Reports\Client\ClientBalance;
use App\Http\Livewire\Dashboard\Notification\ViewNotification;
use App\Http\Livewire\Dashboard\Reports\Supplier\SupplierPayed;
use App\Http\Livewire\Dashboard\Reports\Client\AccountStatement;
use App\Http\Livewire\Dashboard\Reports\Product\Moreandlesssale;
use App\Http\Livewire\Dashboard\Reports\Supplier\SupplierReport;
use App\Http\Livewire\Dashboard\Reports\Supplier\SupplierBalance;
use App\Http\Livewire\Dashboard\Reports\Purchases\PurchasesReport;
use App\Http\Livewire\Dashboard\Reports\Client\MoreAndLessPayClient;
use App\Http\Livewire\Dashboard\Reports\Pos\UserSales;
use App\Http\Livewire\Dashboard\Reports\Purchases\PurchasComparison;
use App\Http\Livewire\Dashboard\Reports\Purchases\PurchasesReturned;
use App\Http\Livewire\Dashboard\Reports\Supplier\MoreLessPaySupllier;
use App\Http\Livewire\Dashboard\Reports\Supplier\SupAccountStatement;
use App\Http\Livewire\Front\Category\Viewcategory as CategoryViewcategory;
use App\Http\Livewire\Dashboard\Reports\Product\LimitProductPay;
use App\Http\Livewire\Front\User\Resetpassword;
use Symfony\Component\Process\Process;

// php artisan migrate --path=database/migrations/system --database=mysql

Route::get('version',  function () {

    $exePath = public_path('asset/update_desk/Order.exe') ;
    $command2 = 'wmic datafile where name="' . $exePath . '" get Version /value';
    $process = new Process($command2);
    $process->run();

    if (!$process->isSuccessful()) {
        throw new \RuntimeException($process->getErrorOutput());
    }

    // Extract version from the output
    $version = explode("=", trim($process->getOutput()))[1];

    return "Version: " . $version;
});

Route::get('sql',  function () {
    // $now = Carbon::now();
    // if (!$verificationCode) {
    //     return redirect()->back()->with('error', 'Your OTP is not correct');
    // }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
    //     return redirect()->route('otp.login')->with('error', 'Your OTP has been expired');
    // }
    // if($verificationCode && $now->isBefore($verificationCode->expire_at)){
    //     return $verificationCode;
    // }
    return user::on('sqlsrv')->get();
});

Route::get('sss',  function () {
    $namedomain = Tenants::getdomain();
    // return  $namedomain   ;
    Cache::forget($namedomain . '_settings');
    return getsetting();
});

Route::domain(env('CENTERAL_DOMAIN', 'order-bay.com'))->group(
    function () {
        Route::prefix('system/dashboard')->group(function () {
            Route::get('/', Dashboard::class)->name('dashboard1');
        });

        Route::get('/1', function () {
            return view('main-domin.index');
        })->name('maindomin');
        // Route::get('/migrate/system', function () {
        //     return view('main-domin.index');
        // })->name('maindomin');


        // Route::get('/migrate/tenants', function () {
        //     return Artisan::call('tenants:migrate');
        // })->name('maindomin');
    }
);

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
// php artisan make:livewire Dashboard/Reports/supplier/supplier_balance

Route::middleware('tenant')->group(function () {


    Route::get('/test', function (Request $request) {


        // $tt = new CheckimageService();
        // $tt->checkimg(null,CateoryApp::class,'image','categoryapp');
        // $tt->checkimg(null,slider::class,'image','sliders');
        // $tt->checkimg(null,ProductDetails::class,'productd_image','products');
        // $tt->checkimg(null,setting::class,'logo_shop','logos');
        // $tt->checkimg(null,Category::class,'image','category');
        // $tt->checkimg(null,gallery::class,'img','gallery');
        // $tt->checkimg(null,notifiction::class,'image','notification');


        // return $updatedString;
        // $users = [
        //     'username'  => 'admin',
        //     'password'  => 'admin1234',
        // ];

        // $admin =  UserAdmin::firstOrCreate($users);
        //    $admin->create($users);
        return view('importclient');
        // $yy = user::get();
        // foreach($yy as $i){
        //     $i->update(['code_client'=> 'On-' . $i->id]);
        // }
    })->name('import');

    Route::post('/import_user', function (Request $request) {
        $file = $request->file('file')->store('excel');
        $import =  new Client;
        $import->import($file);
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        return back()->withStatus('Done');
    })->name('import_user');
    Route::get('/uuuu', function (Request $request) {
        $ss = User::get();
        foreach ($ss as $i) {
            $i->question1_id = 1;
            $i->question2_id = 1;
            $i->answer1 = '123456';
            $i->answer2 = '123456';
            $i->password = Hash::make($i->client_fhonewhats);
            $i->save();
        }
    })->name('import_user');

    Route::get('/', Home::class)->name('home');
    Route::get('/gallery', galleryfront::class)->name('gallery');
    Route::get('/about', About::class)->name('about');
    // Route::get('/privacy', About::class)->name('privacy');
    Route::get('/privacy', function () {
        return view('pp');
    })->name('privacy');
    Route::get('/contactus', Contactus::class)->name('contactus');
    Route::get('/product/search/{search?}', Searchproduct::class)->name('searchproduct');
    Route::get('/products/offers', Offers::class)->name('offerproduct');
    Route::get('/category/{categoryid?}', CategoryViewcategory::class)->name('categoryproduct');

    #################### guest Client #####################
    Route::middleware('guest:client')->group(function () {
        Route::get('/resetpassword', Resetpassword::class)->name('resetpassword');
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
        // Route::get('product', CreateProduct::class)->name('product');
        Route::get('/', mainDashboard::class)->name('dashboard');
        Route::get('/chatlive', Testchat::class)->name('chatlive');
        Route::get('/gallery', galleryback::class)->name('gallerydashboard');
        Route::get('/setting', Settings::class)->name('settings');
        Route::get('/chat', Chat::class)->name('chat');
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

        Route::prefix('report')->name('report.')->group(function () {
            Route::get('/client', ClientReport::class)->name('client');
            Route::get('/client/statement', AccountStatement::class)->name('client_statement');
            Route::get('/client/balance', ClientBalance::class)->name('balance_client');
            Route::get('/client/payed/{id?}', ClientPayed::class)->name('client_payed');
            Route::get('/supplier/payed/{id?}', SupplierPayed::class)->name('supplier_payed');
            Route::get('/supplier/statement', SupAccountStatement::class)->name('supplier_statement');
            Route::get('/supplier/balance', SupplierBalance::class)->name('balance_supplier');
            Route::get('/supplier', SupplierReport::class)->name('supplier');
            Route::get('/client/moreandless', MoreAndLessPayClient::class)->name('client_moreandless');
            Route::get('/supplier/moreandless', MoreLessPaySupllier::class)->name('supplier_moreandless');
            Route::get('/product/moreandless', Moreandlesssale::class)->name('product_moreandless');
            Route::get('/product/limit', LimitProductPay::class)->name('limit_product');
            Route::get('/employee', EmpReport::class)->name('employee');
            Route::get('/employee/salery', EmpSalery::class)->name('employee_salery');
            Route::get('/employee/advance', EmpAdvance::class)->name('employee_advance');
            Route::get('/purchases/returned', PurchasesReturned::class)->name('purchases_returned');
            Route::get('/purchases', PurchasesReport::class)->name('purchases');
            Route::get('/purchases/comparison', PurchasComparison::class)->name('purchases_comparison');
            Route::get('/pos/shift', ShiftReport::class)->name('pos_shift');
            Route::get('/pos/user/sales', UserSales::class)->name('user_sales');
        });
    });
    #################### Dashboard  #####################
    #####################################################
});
