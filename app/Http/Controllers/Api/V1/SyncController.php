<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use permission;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\jobs;
use App\Models\Safe;
use App\Models\unit;
use App\Models\User;
use App\Models\banks;
use App\Models\Shift;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Branch;
use App\Models\cities;
use App\Models\Coupon;
use App\Models\Damage;
use App\Models\income;
use App\Models\region;
use App\Models\slider;
use App\Facade\Tenants;
use App\Models\comment;
use App\Models\gallery;
use App\Models\logsync;
use App\Models\pricing;
use App\Models\setting;
use App\Models\Category;
use App\Models\deferred;
use App\Models\Employee;
use App\Models\Expenses;
use App\Models\Partners;
use App\Models\Supplier;
use App\Models\Offer_Bay;
use App\Models\UserAdmin;
use App\Models\Attendance;
use App\Models\CateoryApp;
use App\Models\Statements;
use App\Models\ErolmentEmp;
use App\Models\incomeTypes;
use App\Models\SalesHeader;
use App\Models\SecondOffer;
use App\Models\MovementBank;
use App\Models\ProductMoves;
use App\Models\SalesDetails;
use App\Models\UserDelivery;
use Illuminate\Http\Request;
use App\Models\ExpensesTypes;
use App\Models\Move_Partners;
use App\Models\MovementStock;
use App\Models\ProductHeader;
use App\Models\Supplier_Grup;
use App\Models\ClientPayments;
use App\Models\DeliveryHeader;
use App\Models\ProductDetails;
use App\Models\PurchaseHeader;
use App\Models\DeliveryDetails;
use App\Models\MovementBalance;
use App\Models\PurchaseDetails;
use App\Models\StockSettlement;
use App\Models\PermissionScrene;
use App\Models\SupplierPayments;
use App\Models\Permissions_Saels;
use App\Models\userdesck;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\UserResource;
use App\Models\MovementStockDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\clientsyncResource;
use App\Http\Livewire\Front\Compon\Product;
use App\Http\Resources\sync\DeliveryHeaderResource;


class SyncController extends Controller
{
    function client_count()
    {
        $count = user::count();
        return    Resp($count, 'success', 200, true);
    }
    function getuser($id)
    {
        $user = user::find($id);
        return    Resp(new ClientResource($user), 'success', 200, true);
    }
    function client(Request $request)
    {
        try {
            // Log::warning($request->all());
            $results = [];
            foreach ($request->all() as $index => $item) {
                // $user = User::where(['client_fhonewhats'   => $item['Client_fhoneWhats'], 'source_id' => $item['Client_id']])->first();
                $user = User::where(['client_fhonewhats'   => $item['Client_fhoneWhats'], 'source_id' => $item['Client_id']])->first();
                if ($user != null) {
                    // Log::info('update ', [$user]);
                    $user->update([
                        'source_id'           => $item['Client_id'],
                        'client_name'         => $item['Client_name'],
                        'client_Balanc'       => $item['Client_Balanc'],
                        'client_points'       => $item['Client_points'],
                        'client_fhoneLeter'   => $item['Client_fhoneLeter'],
                        'client_EntiteNumber' => $item['Client_EntiteNumber'],
                        'region_id'           => $item['Region_id'],
                        'store_name'          => $item['stor_name'],
                        'lat_mab'             => $item['Lat_mab'],
                        'long_mab'            => $item['Long_mab'],
                        'client_state'        => $item['Client_state'],
                        'client_Credit_Limit' => $item['Client_Credit_Limit'],
                        'default_Sael'        => $item['default_Sael'],
                        'client_note'         => $item['Client_note'],
                        'code_client'         => $item['Client_code'],
                        'categoryAPP'         => $item['CategoryAPP'],
                        'client_Active'       => $item['Client_Active'],
                        'created_at'          => $item['caret_data']
                    ]);
                } else {
                    $user = User::where(['client_fhonewhats'   => $item['Client_fhoneWhats']])->first();
                    if ($user != null) {
                         Log::Error('update client id' . $item['Client_id']);
                        $user->update([
                            'source_id'           => $item['Client_id']
                        ]);
                    } else {
                        $user = User::create([
                            'client_fhonewhats'   => $item['Client_fhoneWhats'],
                            'password'            => Hash::make($item['Client_fhoneWhats']),
                            'question1_id'        => 1,
                            'question2_id'        => 1,
                            'answer1'             => '123456',
                            'answer2'             => '123456',
                            'source_id'           => $item['Client_id'],
                            'client_name'         => $item['Client_name'],
                            'client_Balanc'       => $item['Client_Balanc'],
                            'client_points'       => $item['Client_points'],
                            'client_fhoneLeter'   => $item['Client_fhoneLeter'],
                            'client_EntiteNumber' => $item['Client_EntiteNumber'],
                            'region_id'           => $item['Region_id'],
                            'store_name'          => $item['stor_name'],
                            'lat_mab'             => $item['Lat_mab'],
                            'long_mab'            => $item['Long_mab'],
                            'client_state'        => $item['Client_state'],
                            'client_Credit_Limit' => $item['Client_Credit_Limit'],
                            'default_Sael'        => $item['default_Sael'],
                            'client_note'         => $item['Client_note'],
                            'code_client'         => $item['Client_code'],
                            'categoryAPP'         => $item['CategoryAPP'],
                            'client_Active'       => $item['Client_Active'],
                            'created_at'          => $item['caret_data']
                        ]);
                    }
                    $results[$index] = ['id' => $user->id, 'source_id' => $user->source_id];
                }
                // Log::warning($request->all());
                // logsync::create(['type' => 'success', 'data' => json_encode($item), 'massage' => null]);
            }
            // $data = ['users_online' =>   clientsyncResource::collection(User::where('source_id', null)->get()) ?? [], 'results' => $results ?? [], 'errors' => $errors ?? []];
            $data = ['users_online' =>   clientsyncResource::collection(User::where('source_id', null)->get()) ?? [], 'results' => $results ?? [], 'errors' =>  []];

            // Log::error($data);
            return  $data;
        } catch (\Exception $e) {
            logsync::create(['type' => "Error", 'data' => null,  'massage' =>  json_encode($e->getMessage())]);
            // Log::error($e->getMessage());
        }
    }
    // function client(Request $request)
    // {
    //     try {
    //         Log::warning($request->all());
    //         $results = [];
    //         foreach ($request->all() as $index => $item) {

    //             $user = User::updateOrCreate(['client_fhonewhats'   => $item['Client_fhoneWhats'], 'source_id'   => $item['Client_id']], [
    //                 'client_fhonewhats'   => $item['Client_fhoneWhats'],
    //                 'source_id'           => $item['Client_id'],
    //                 'client_name'         => $item['Client_name'],
    //                 'client_Balanc'       => $item['Client_Balanc'],
    //                 'client_points'       => $item['Client_points'],
    //                 'client_fhoneLeter'   => $item['Client_fhoneLeter'],
    //                 'client_EntiteNumber' => $item['Client_EntiteNumber'],
    //                 'region_id'           => $item['Region_id'],
    //                 'store_name'          => $item['stor_name'],
    //                 'lat_mab'             => $item['Lat_mab'],
    //                 'long_mab'            => $item['Long_mab'],
    //                 'client_state'        => $item['Client_state'],
    //                 'client_Credit_Limit' => $item['Client_Credit_Limit'],
    //                 'default_Sael'        => $item['default_Sael'],
    //                 'client_note'         => $item['Client_note'],
    //                 'code_client'         => $item['Client_code'],
    //                 'categoryAPP'         => $item['CategoryAPP'],
    //                 'client_Active'       => $item['Client_Active'],
    //                 'created_at'          => $item['caret_data']
    //             ]);
    //             // Log::warning($request->all());

    //             $results[$index] = ['id' => $user->id, 'source_id' => $user->source_id];
    //             // logsync::create(['type' => 'success', 'data' => json_encode($item), 'massage' => null]);
    //         }

    //         // $data = ['users_online' =>   clientsyncResource::collection(User::where('source_id', null)->get()) ?? [], 'results' => $results ?? [], 'errors' => $errors ?? []];
    //         $data = ['users_online' =>   clientsyncResource::collection(User::where('source_id', null)->get()) ?? [], 'results' => $results ?? [], 'errors' =>  []];

    //         return  $data;
    //     } catch (\Exception $e) {
    //         // logsync::create(['type' => "Error", 'data' => null,  'massage' =>  json_encode($e->getMessage())]);
    //         Log::error($e->getMessage());
    //     }
    // }
    function updateclient(Request $request)
    {
        try {
            Log::info('fun update client ', $request->all());
            foreach ($request->all() as $index => $item) {
                User::whereId($item['id'])->update(['source_id' => $item['source_id']]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return  Resp(null, 'Error', 400, true);
        }
    }
    // function uploadproductsheader(Request $request)
    // {
    //     Log::info('uploadproductsheader ', $request->all());

    //     try {
    //         foreach ($request->all() as $index => $item) {
    //             $uu =   ProductHeader::updateOrCreate(['id' => $item['Products_ID']], [
    //                 'id'                => $item['Products_ID'],
    //                 'product_name'      => $item['Products_name'],
    //                 'product_category'  => $item['Products_Sup_id'],
    //                 'product_acteve'    => ($item['Products_Acteve'] == true) ? 1 : ($item['Products_Acteve'] == false ? 0 : $item['Products_Acteve']),
    //                 'product_isscale'   => ($item['Products_IsScale'] == true) ? 1 : ($item['Products_IsScale'] == false ? 0 : $item['Products_IsScale']),
    //                 'product_online'    => ($item['Products_Onlein'] == true) ? 1 : ($item['Products_Onlein'] == false ? 0 : $item['Products_Onlein']),
    //                 'product_tax'       => $item['Products_Tax'],
    //                 'product_limit'     => $item['Products_Lemt'],
    //                 'user_id'           => $item['user_id'],
    //                 'product_limit_day' => $item['Products_lemt_day'],
    //                 'product_note'      => $item['Products_note'],
    //             ]);
    //             logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
    //         }
    //         return Resp(null, 'Success', 200, true);
    //     } catch (\Illuminate\Database\QueryException  $exception) {
    //         $e = $exception->errorInfo;
    //         logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
    //         return    Resp(null, 'Error', 400, true);
    //     }
    // }
    function uploadproducts(Request $request)
    {
        Log::info('uploadproducts ', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   ProductHeader::updateOrCreate(['id' => $item['Products_ID']], [
                    'id'                => $item['Products_ID'],
                    'product_name'      => $item['Products_name'],
                    'product_category'  => $item['Products_Sup_id'],
                    'product_acteve'    => ($item['Products_Acteve'] == true) ? 1 : ($item['Products_Acteve'] == false ? 0 : $item['Products_Acteve']),
                    'product_isscale'   => ($item['Products_IsScale'] == true) ? 1 : ($item['Products_IsScale'] == false ? 0 : $item['Products_IsScale']),
                    'product_online'    => ($item['Products_Onlein'] == true) ? 1 : ($item['Products_Onlein'] == false ? 0 : $item['Products_Onlein']),
                    'product_tax'       => $item['Products_Tax'],
                    'product_limit'     => $item['Products_Lemt'],
                    'user_id'           => $item['user_id'],
                    'product_limit_day' => $item['Products_lemt_day'],
                    'product_note'      => $item['Products_note'],
                ]);
                // ProductDetails::where('product_header_id', $item['Products_ID'])->delete();
                foreach ($item['Details'] as $index => $item2) {
                    $image = $item2['ProductsD_image'] != null ? uploadbase64images('products', $item2['ProductsD_image']) : null;
                    $uu =   ProductDetails::updateOrCreate(['id' => $item2['ProductD_id']], [
                        'id'                 => $item2['ProductD_id'],
                        'product_header_id'  => $item2['Product_id'],
                        'productd_unit_id'   => $item2['ProductsD_unit_id'],
                        'productd_barcode'   => $item2['ProductsD_Barcode'],
                        'productd_size'      => $item2['ProductsD_Size'],
                        'productd_bay'       => $item2['ProductsD_Bay'],
                        'productd_Sele1'     => $item2['ProductsD_Sele1'],
                        'productd_Sele2'     => $item2['ProductsD_Sele2'],
                        'productd_fast_Sele' => ($item2['ProductsD_fast_Sele'] == true) ? 1 : ($item2['ProductsD_fast_Sele'] == false ? 0 : $item2['ProductsD_fast_Sele']),
                        'productd_UnitType'  => $item2['ProductsD_UnitType'],
                        'productd_image'     => $image,
                        'isoffer'            => ($item2['IsOffer'] == true) ? 1 : ($item2['IsOffer'] == false ? 0 : $item2['IsOffer']),
                        'productd_online'    => ($item2['Product_Onlein'] == true) ? 1 : ($item2['Product_Onlein'] == false ? 0 : $item2['Product_Onlein']),
                        'maxqty'             => $item2['MaxQuntte'],
                        'EndOferDate'        => Carbon::parse($item2['EndOferDate'])->format('Y-m-d H:i:s'),
                    ]);
                    // logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
                }
                // logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    // function uploadproductsdetails(Request $request)
    // {
    //     Log::info('uploadproductsdetails ', $request->all());

    //     try {
    //         foreach ($request->all() as $index => $item) {

    //             $image = $item['ProductsD_image'] != null ? uploadbase64images('products', $item['ProductsD_image']) : null;
    //             $uu =   ProductDetails::updateOrCreate(['id' => $item['ProductD_id']], [
    //                 'id'                 => $item['ProductD_id'],
    //                 'product_header_id'  => $item['Product_id'],
    //                 'productd_unit_id'   => $item['ProductsD_unit_id'],
    //                 'productd_barcode'   => $item['ProductsD_Barcode'],
    //                 'productd_size'      => $item['ProductsD_Size'],
    //                 'productd_bay'       => $item['ProductsD_Bay'],
    //                 'productd_Sele1'     => $item['ProductsD_Sele1'],
    //                 'productd_Sele2'     => $item['ProductsD_Sele2'],
    //                 'productd_fast_Sele' => ($item['ProductsD_fast_Sele'] == true) ? 1 : ($item['ProductsD_fast_Sele'] == false ? 0 : $item['ProductsD_fast_Sele']),
    //                 'productd_UnitType'  => $item['ProductsD_UnitType'],
    //                 'productd_image'     => $image,
    //                 'isoffer'            => ($item['IsOffer'] == true) ? 1 : ($item['IsOffer'] == false ? 0 : $item['IsOffer']),
    //                 'productd_online'    => ($item['Product_Onlein'] == true) ? 1 : ($item['Product_Onlein'] == false ? 0 : $item['Product_Onlein']),
    //                 'maxqty'             => $item['MaxQuntte'],
    //                 'EndOferDate'        => Carbon::parse($item['EndOferDate'])->format('Y-m-d H:i:s'),
    //             ]);
    //             logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
    //         }
    //         return Resp(null, 'Success', 200, true);
    //     } catch (\Illuminate\Database\QueryException  $exception) {
    //         $e = $exception->errorInfo;
    //         logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
    //         return    Resp(null, 'Error', 400, true);
    //     }
    // }
    function uploadunits(Request $request)
    {
        Log::info('upload UNIT client SyncController', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   unit::updateOrCreate(["id" => $item['unit_id']], [
                    "id"            => $item['unit_id'],
                    "unit_name"     => $item['unit_name'],
                    "unit_note"     => $item['unit_note'],
                    "unit_active"   => ($item['unit_Active'] == true) ? 1 : ($item['unit_Active'] == false ? 0 : $item['unit_Active']),
                    "user_id"       => $item['user_id']
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploadcategory(Request $request)
    {
        Log::info('upload Category client SyncController', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $image = $item['image'] != null ? uploadbase64images('category', $item['image']) : null;
                $succ =   Category::updateOrCreate(["id" => $item['Category_id']], [
                    "id"              => $item['Category_id'],
                    "parent_id"       => $item['parntID'],
                    "category_name"   => $item['Category_name'],
                    "image"           => $image,
                    "category_note"   => $item['Category_note'],
                    "category_active" => ($item['Category_Active'] == true) ? 1 : ($item['Category_Active'] == false ? 0 : $item['Category_Active']),
                    "user_id"         => $item['user_id']
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($succ), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploadsalse(Request $request)
    {
        Log::info('SalesHeader ', $request->all());

        try {
            foreach ($request->all() as $index => $item) {
                $uu =   SalesHeader::updateOrCreate(["id"  => $item['SalesHeader_ID'],], [
                    "id"            => $item['SalesHeader_ID'],
                    "invoicenumber" => $item['InvoiceNumber'],
                    "coupon_id"     => $item['coupon_id'],
                    "type_order"    => $item['Type_Order'],
                    "invoicetype"   => $item['InvoiceType'],
                    "invoicedate"   => $item['InvoiceDate'],
                    "client_id"     => $item['Client_ID'],
                    "lastbalance"   => $item['LastBalance'],
                    "finalbalance"  => $item['finalbalance'],
                    "user_id"       => $item['User_ID'],
                    "store_id"      => $item['Store_ID'],
                    "safe_id"       => $item['Safe_ID'],
                    "status"        => $item['Status'],
                    "employ_id"     => $item['Employ_ID'],
                    "dis_point_active" => $item['Dis_Point_Active'],
                    "paytayp"       => $item['PayTayp'],
                    "subtotal"      => $item['SubTotal'],
                    "totaldiscount" => $item['Total_Discount'],
                    "discount_g"    => $item['Discount_G'],
                    "discount_f"    => $item['Discount_F'],
                    "total_add_amount" => $item['Total_Add_Amount'],
                    "add_amount_g"  => $item['Add_Amount_G'],
                    "add_amount_f"  => $item['Add_Amount_F'],
                    "discount_product" => $item['Discount_Prduct'],
                    "discount_sales" => $item['Discount_Sales'],
                    "discount_point" => $item['Discount_Point'],
                    "grandtotal"     => $item['GrandTotal'],
                    "paid"           => $item['Paid'],
                    "remaining"      => $item['Remaining'],
                    "total_profit"   => $item['Total_Profit'],
                    "note"           => $item['note'],
                    "deliverycost"   => $item['DelverCost'],
                    "satus_delivery" => $item['Status_Delvery'],
                    "sales_online"   => $item['SalesOnlain']
                ]);
                SalesDetails::where('sale_header_id', $item['SalesHeader_ID'])->delete();
                foreach ($item['Details'] as $index => $item2) {
                    Log::info('SalesDetails', $item2);
                    $uu2 =   SalesDetails::create([
                        'sale_header_id'     => $item['SalesHeader_ID'],
                        'product_details_id' => $item2['ProductDetails_ID'],
                        'buyprice'           => $item2['BuyPrice'],
                        'sellprice'          => $item2['SellPrice'],
                        'quantity'           => $item2['Quantity'],
                        'subtotal'           => $item2['SubTotalD'],
                        'discount'           => $item2['Discount'],
                        'grandtotal'         => $item2['GrandTotalD'],
                        'profit'             => $item2['Profit']
                    ]);
                    logsync::create(['type' => 'success', 'data' => json_encode($uu2), 'massage' => null]);
                }
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }

    function uploadsdelivery(Request $request)
    {
        Log::info('Delivery', ['0' => $request->all()]);
        //تم الاستلام /جارى التجهيز /خرج للتوصيل / التوصيل
        try {
            foreach ($request->all() as $index => $item) {
                Log::error($item['Type_Order']);
                $oldtypeorder = DeliveryHeader::where("id", $item['SalesHeader_ID'])->select('type_order', 'client_id')->first();
                if ($item['Type_Order']  != $oldtypeorder->type_order) {
                    if (getsetting()->notif_change_statu == 1) {
                        $user =  user::where('source_id', $item['Client_ID'])->select('fsm')->first();
                        $body = replacetext(getsetting()->notif_change_text, null, null, null, $item['Type_Order']);
                        notificationFCM('مرحبأ ', $body, [$user->fsm]);
                        if ($item['Type_Order'] == 'تم التوصيل') {
                            DeliveryHeader::where("id", $item['SalesHeader_ID'])->delete();
                            DeliveryDetails::where('sale_header_id',  $item['SalesHeader_ID'])->delete();
                            return Resp(null, 'Success', 200, true);
                        }
                    }
                }
                $user =  user::where('source_id', $item['Client_ID'])->select('id')->first();
                $uu =   DeliveryHeader::updateOrCreate(["id"  =>  $item['SalesHeader_ID'],], [
                    "id"            =>  $item['SalesHeader_ID'],
                    "invoicenumber" =>  $item['InvoiceNumber'],
                    "coupon_id"     =>  $item['coupon_id'],
                    "type_order"    =>  $item['Type_Order'],
                    "invoicetype"   =>  $item['InvoiceType'],
                    "invoicedate"   =>  $item['InvoiceDate'],
                    "client_id"     =>  $user->id,  //$item['Client_ID'],
                    "lastbalance"   =>  $item['LastBalance'],
                    "finalbalance"  =>  $item['finalbalance'],
                    "user_id"       =>  $item['User_ID'],
                    "store_id"      =>  $item['Store_ID'],
                    "safe_id"       =>  $item['Safe_ID'],
                    "status"        =>  $item['Status'],
                    "employ_id"     =>  $item['Employ_ID'],
                    "dis_point_active" =>  $item['Dis_Point_Active'],
                    "paytayp"       =>  $item['PayTayp'],
                    "subtotal"      =>  $item['SubTotal'],
                    "totaldiscount" =>  $item['Total_Discount'],
                    "discount_g"    =>  $item['Discount_G'],
                    "discount_f"    =>  $item['Discount_F'],
                    "total_add_amount" =>  $item['Total_Add_Amount'],
                    "add_amount_g"  =>  $item['Add_Amount_G'],
                    "add_amount_f"  =>  $item['Add_Amount_F'],
                    "discount_product" =>  $item['Discount_Prduct'],
                    "discount_sales" =>  $item['Discount_Sales'],
                    "discount_point" =>  $item['Discount_Point'],
                    "grandtotal"     =>  $item['GrandTotal'],
                    "paid"           =>  $item['Paid'],
                    "remaining"      =>  $item['Remaining'],
                    "total_profit"   =>  $item['Total_Profit'],
                    "note"           =>  $item['note'],
                    "deliverycost"   =>  $item['DelverCost'],
                    "satus_delivery" =>  $item['Status_Delvery'],
                    "sales_online"   =>  $item['SalesOnlain']
                ]);
                DeliveryDetails::where('sale_header_id',  $item['SalesHeader_ID'])->delete();
                foreach ($item['Details'] as $index => $item2) {
                    Log::info('DeliveryHeader', $item2);
                    $uu2 =   DeliveryDetails::create([
                        'sale_header_id'     => $item['SalesHeader_ID'],
                        'product_details_id' => $item2['ProductDetails_ID'],
                        'buyprice'           => $item2['BuyPrice'],
                        'sellprice'          => $item2['SellPrice'],
                        'quantity'           => $item2['Quantity'],
                        'subtotal'           => $item2['SubTotalD'],
                        'discount'           => $item2['Discount'],
                        'grandtotal'         => $item2['GrandTotalD'],
                        'profit'             => $item2['Profit']
                    ]);
                    logsync::create(['type' => 'success', 'data' => json_encode($uu2), 'massage' => null]);
                }
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($uu),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploaddeliverydetails(Request $request)
    {
        Log::info('uploaddeliverydetails', $request->all());
        try {
            DeliveryDetails::where('sale_header_id', $request[0]['SalesHeader_ID'])->delete();
            foreach ($request->all() as $index => $item) {

                $uu =   DeliveryDetails::updateOrCreate(['id' => $item['SalesDetails_ID']], [
                    'id'                 => $item['SalesDetails_ID'],
                    'sale_header_id'     => $item['SalesHeader_ID'],
                    'product_details_id' => $item['ProductDetails_ID'],
                    'buyprice'           => $item['BuyPrice'],
                    'sellprice'          => $item['SellPrice'],
                    'quantity'           => $item['Quantity'],
                    'subtotal'           => $item['SubTotalD'],
                    'discount'           => $item['Discount'],
                    'grandtotal'         => $item['GrandTotalD'],
                    'profit'             => $item['Profit']
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploadslider(Request $request)
    {
        Log::info('uploadslider', $request->all());
        try {

            foreach ($request->all() as $index => $item) {
                $image = $item['image'] != null ? uploadbase64images('sliders', $item['image']) : null;

                $uu =   slider::updateOrCreate(['id' => $item['SliderID']], [
                    'id'       => $item['SliderID'],
                    'name'     => $item['Name'],
                    'image'    => $image,
                    'active'   => ($item['active'] == true) ? 1 : ($item['active'] == false ? 0 : $item['active']),
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploadgallery(Request $request)
    {
        Log::info('uploadgallery', $request->all());
        try {

            foreach ($request->all() as $index => $item) {
                $image = $item['image'] != null ? uploadbase64images('gallery', $item['image']) : null;

                $uu =   gallery::updateOrCreate(['id' => $item['id']], [
                    'id'       => $item['id'],
                    'text'     => $item['note'],
                    'img'       => $image,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function deletegallery($id)
    {

        try {
            $gallery =  gallery::find($id);
            if ($gallery == null) {
                return    Resp(null, 'Error', 400, true);
            }
            Log::info('deleteslider', ['id' => $id, 'orginalimage' =>  $gallery->orginalimage]);
            $gallery->orginalimage != null ? deleteimage('gallery',  $gallery->orginalimage) : null;
            $gallery->delete();
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => $gallery,  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function deleteslider($id)
    {
        try {
            $slider =  slider::find($id);
            Log::info('deleteslider', ['id' => $id, 'orginalimage' =>  $slider->orginalimage]);
            $slider->orginalimage != null ? deleteimage('sliders',  $slider->orginalimage) : null;
            $slider->delete();
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => $slider,  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function downsdeliveryheader(Request $request)
    {
        $data = DeliveryHeader::with('salesdetails')->get();
        // $data = DeliveryHeader::where('lastsyncdate', null)->with('salesdetails')->get();
        DeliveryHeader::query()->where('lastsyncdate', null)->update(['lastsyncdate' => carbon::now()]);
        // return    Resp( $data, 'success', 200, true);
        return    Resp(DeliveryHeaderResource::collection($data), 'success', 200, true);
    }
    function downdeliverydetails(Request $request)
    {
        $data = DeliveryDetails::where('lastsyncdate', null)->get();
        DeliveryDetails::query()->where('lastsyncdate', null)->update(['lastsyncdate' => carbon::now()]);
        return    Resp($data, 'success', 200, true);
    }
    function downcomment()
    {
        $data = comment::whereHas('salesheader')->get();
        return    Resp(CommentResource::collection($data), 'success', 200, true);
    }
    function getcart()
    {
        $data = Cart::get();
        return    Resp(CartResource::collection($data), 'success', 200, true);
    }
    function sendnotification(Request $request)
    {
        $dd = json_decode($request[0], true);

        $image = $dd['image'] != null ? uploadbase64images('notification', $dd['image']) : null;
        $img =  getimage($image, 'notification');
        $result = notificationFCM($dd['title'], $dd['body'], $dd['users'], null, $img);
        // $notifi =   // return    Resp($notifi , 'success', 200, true);

    }
    function getfsm_notification()
    {
        // dd('');
        // $userfsm = user::where('fsm','!=',null)->pluck(['id','fsm','source_id']);
        $userfsm = user::where('fsm', '!=', null)->select('id', 'fsm', 'source_id')->get()->toarray();
        return    Resp($userfsm, 'success', 200, true);
    }
    function uploadcoupon(Request $request)
    {
        Log::info('uploadcode', $request->all());
        try {

            foreach ($request->all() as $index => $item) {
                $uu =   Coupon::updateOrCreate(['id' => $item['PrmoCode_ID']], [
                    'id'          => $item['PrmoCode_ID'],
                    'user_id'     => $item['userID'],
                    'code'        => $item['PrmoCode'],
                    'name'        => $item['PrmoName'],
                    'value'       => $item['value'],
                    'type'        => $item['TypeDec'],
                    'min_invoce'  => $item['min_invoce'],
                    'used'        => $item['used'],
                    'start_date'  => Carbon::parse($item['stardate'])->format('Y-m-d H:i:s'),
                    'end_date'    => Carbon::parse($item['enddate'])->format('Y-m-d H:i:s'),
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploademp(Request $request)
    {
        Log::info('uploademp', $request->all());
        try {

            foreach ($request->all() as $index => $item) {
                $image = $request['Employees_image'] != null ? uploadbase64images('employees', $request['Employees_image']) : null;

                $uu =   Employee::updateOrCreate(['id' => $item['Employees_id']], [
                    'id' => $item['Employees_id'],
                    'name' => $item['Employees_name'],
                    'code' => $item['Employees_code'],
                    'phone' => $item['Employees_fhone'],
                    'identite' => $item['Employees_EntiteNumber'],
                    'region_id' => $item['Region_id'],
                    'paytype_id' => $item['PayType_id'],
                    'pay_sel' => $item['Pay_Sel'],
                    'total_houre' => $item['Total_hour'],
                    'job_id' => $item['jobs_id'],
                    'branch_id' => $item['Branch_id'],
                    'data_active' => Carbon::parse($item['data_Active'])->format('Y-m-d H:i:s'),
                    'data_unactive' => Carbon::parse($item['data_unActive'])->format('Y-m-d H:i:s'),
                    'note' => $item['Employees_note'],
                    'image' =>   $image,
                    'active' => $item['Employees_Active'],
                    'user_id' => $item['user_id'],
                    'state' => $item['Employees_state'],

                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploadcategoryapp(Request $request)
    {
        Log::info('uploadcategoryapp', $request->all());
        try {

            foreach ($request->all() as $index => $item) {
                $image = $item['image'] != null ? uploadbase64images('categoryapp', $item['image']) : null;
                $uu =   CateoryApp::updateOrCreate(['id' => $item['CategoryAPP_ID']], [
                    'id'          => $item['CategoryAPP_ID'],
                    'name'        => $item['name'],
                    'image'       =>  $image,
                    'note'        => $item['note'],
                    'user_id'     => $item['userID'],
                    'cat_active'  => $item['CAT_Acteve'],

                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function uploaduser_deliveries(Request $request)
    {
        Log::info('user_deliveries', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   UserDelivery::updateOrCreate(['id' => $item['DelvryID']], [
                    'id'        => $item['DelvryID'],
                    'username'  => $item['userName'],
                    'emp_id'    => $item['EmpID'],
                    'password'  => $item['Passwrd'],
                    'user_id'   => $item['userID'],
                    'active'    => $item['Delvry_Active'],

                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            $data =   UserDelivery::get();
            return Resp($data, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return Resp(null, 'Error', 400, true);
        }
    }
    function get_deferreds()
    {
        $deferred = deferred::get();
        return Resp($deferred, 'Success', 200, true);
    }
    function upload_deferreds(Request  $request)
    {
        Log::info('user_deliveries', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   deferred::updateOrCreate(['user_id' => $item['ClaintID']], [
                    'statu'    => $item['Acteve'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp('', 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => $uu,  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_jobs(Request  $request)
    {

        Log::info('upload_jobs', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   jobs::updateOrCreate(['jobs_id' => $item['jobs_id']], [
                    'jobs_id'      => $item['jobs_id'],
                    'jobs_name'    => $item['jobs_name'],
                    'jobs_Active'  => $item['jobs_Active'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp('', 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => $item,  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_setting(Request $request)
    {
        Log::info('uploadsetting', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {

                $image = $item['Logo_Shope'] != null ? uploadbase64images('logos', $item['Logo_Shope']) : null;
                $uu    = setting::find(1);
                if ($uu) {
                    deleteimage('logos', $uu->logo_shop);
                }
                $uu    =   setting::updateOrCreate(['id' => 1], [
                    'name_shop'         => $item['Name_Shope'],
                    'maneger_phone'     => $item['Manegaer_Fhone'],
                    'phone_shop'        => $item['Shope_Fhone'],
                    'address_shop'      => $item['Shope_Adresse'],
                    'logo_shop'         => $image,
                    'message_report'    => $item['Messge_Report'],
                    'delivery_amount'   => $item['Delivery_Amount'],
                    'delivery_message'  => $item['Delivery_Messge'],
                    'salesstatus'       => $item['SalesStatus'],
                    'point_system'      => $item['PointSystem'],
                    'point_le'          => $item['PointPerLE'],
                    'region_id'         => $item['Region'],
                    'country_id'        => $item['Country'],
                    'supcategory_id'    => $item['SUPCategoryAPPID'],
                    'type_of_goods'     => $item['Type_of_goods'],
                    'delivery_though'   => $item['delivery_through'],
                    'minimum_products'  => $item['Minimum_products'],
                    'minimum_financial' => $item['Financial_minimum'],
                    'deferred_sale'     => $item['deferred_sale'],
                    'low_profit'        => $item['low_profit'],
                    'Store_id'          => $item['Store_id'],
                    'point_price'       => $item['PointPrice'],
                    'BackupDB'          => $item['BackupDB'],
                    'city_id'           => $item['City'],
                    'Shop_Manegaer'     => $item['Shop_Manegaer'],
                    'app_android'       => $item['app_android'],
                    'app_ios'           => $item['app_ios'],
                    'facebook'          => $item['facebook'],
                    'phone_site'        => $item['phone_site'],
                    'youtube'           => $item['youtube'],
                    'about'             => $item['about'],
                    'lat'               => $item['lat1'],
                    'long'              => $item['long1']
                ]);


                logsync::create(['type' => 'success', 'data' => json_encode($item), 'massage' => null]);
            }
            setsetting();
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function delete_selseheader($id)
    {
        Log::info('delete_selseheader', ['0' => $id]);

        try {
            SalesHeader::where('id', $id)->delete();
            SalesDetails::where('sale_header_id', $id)->delete();
            logsync::create(['type' => 'success', 'data' => json_encode($id), 'massage' => null]);

            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($id),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function delete_deliveryheader($id)
    {
        Log::info('delete_selseheader', ['0' => $id]);

        try {
            DeliveryHeader::where('id', $id)->delete();
            DeliveryDetails::where('sale_header_id', $id)->delete();
            logsync::create(['type' => 'success', 'data' => json_encode($id), 'massage' => null]);

            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($id),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_store(Request $request)
    {
        Log::info('uploadStock', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Store::updateOrCreate(['id' => $item['Store_id']], [
                    'id'          => $item['Store_id'],
                    'store_name'    => $item['Store_name'],
                    'store_phone'  => $item['Store_fhone'],
                    'store_note'  => $item['Store_note'],
                    'branch_id'  => $item['Branch_id'],
                    'user_id'  => $item['user_id'],
                    'store_active'    => $item['Store_Active'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_stock(Request $request)
    {
        Log::info('upload_stock', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Stock::updateOrCreate(['id' => $item['Stock_ID']], [
                    'id'          => $item['Stock_ID'],
                    'store_id'    => $item['Store_id'],
                    'product_id'  => $item['Product_Id'],
                    'quantity'    => $item['Quantity'],
                    'expiredate'  => $item['ExpireDate'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($item), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_Attendance(Request $request)
    {
        Log::info('upload_Attendance', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Attendance::updateOrCreate(['id' => $item['Attendance_id']], [
                    'id'          => $item['Attendance_id'],
                    'Emp_id'    => $item['Emp_id'],
                    'start_time'  => $item['start_time'],
                    'end_time'    => $item['end_time'],
                    'user_id_start'  => $item['user_id_start'],
                    'user_id_End'  => $item['user_id_End'],
                    'Total_hour'  => $item['Total_hour'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_banks(Request $request)
    {
        Log::info('upload_banks', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = banks::updateOrCreate(['id' => $item['banks_id']], [
                    'id'            => $item['banks_id'],
                    'banks_name'    => $item['banks_name'],
                    'banksNamper'   => $item['banksNamper'],
                    'name_branch'   => $item['name_branch'],
                    'discount'      => $item['discount'],
                    'banks_note'    => $item['banks_note'],
                    'balanceNow'    => $item['balanceNow'],
                    'banks_Acteve'  => $item['banks_Acteve'],
                    'user_id'       => $item['user_id'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_Damage(Request $request)
    {
        Log::info('upload_Damage', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Damage::updateOrCreate(['id' => $item['DamageId']], [
                    'id'          => $item['DamageId'],
                    'ProductDetailsId'    => $item['ProductDetailsId'],
                    'DamageQuantity'  => $item['DamageQuantity'],
                    'BuyPrice'    => $item['BuyPrice'],
                    'DamageDate'  => $item['DamageDate'],
                    'DamageNotes'  => $item['DamageNotes'],
                    'DamageCost'  => $item['DamageCost'],
                    'UserId'  => $item['UserId'],
                    'StoreId'  => $item['StoreId'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_erolment_emps(Request $request)
    {
        Log::info('upload_erolment_emps', ['0' => $request->all()]);

        try {

            foreach ($request->all() as $index => $item) {
                $uu = ErolmentEmp::updateOrCreate(['id' => $item['eroment_id']], [
                    'id'          => $item['eroment_id'],
                    'jop_id'      => $item['jop_id'],
                    'emp_name'    => $item['emp_name'],
                    'emp_fhone'   => $item['emp_fhone'],
                    'emp_note'    => $item['emp_note'],
                    'user_id'     => $item['user_id'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    // ######################NEW###################
    // ######################NEW###################
    // ######################NEW###################
    function upload_supplier_grups(Request $request)
    {

        Log::info('upload_supplier_grups', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Supplier_Grup::updateOrCreate(['SupplierGrup_id' => $item['SupplierGrup_id']], [
                    'SupplierGrup_id'  => $item['SupplierGrup_id'],
                    'SupplierGrup_name' => $item['SupplierGrup_name'],
                    'Grup_note'        => $item['Grup_note'] ?? '',
                    'user_id'          => $item['user_id'],
                    'Grup_Active'      => $item['Grup_Active'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_second_offers(Request $request)
    {
        Log::info('upload_second_offers', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = SecondOffer::updateOrCreate(['id' => $item['Id']], [
                    'id'                 => $item['Id'],
                    'product_details_id' => $item['ProductDetailsId'],
                    'pieces_number'     => $item['PiecesNumber'],
                    'discount'          => $item['Discount'],
                    'from_date'         => $item['FromDate'],
                    'to_date'           => $item['ToDate'],
                    'price_before'      => $item['PriceBefore'],
                    'price_after'       => $item['PriceAfter'],
                    'user_id'           => $item['user_id'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_suppliers(Request $request)
    {
        Log::info('upload_suppliers', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Supplier::updateOrCreate(['id' => $item['Supplier_id']], [
                    'id'      => $item['Supplier_id'],
                    'Supplier_name'    => $item['Supplier_name'],
                    'Supplier_code'    => $item['Supplier_code'],
                    'Supplier_Balance' => $item['Supplier_Balance'],
                    'Supplier_fhone'   => $item['Supplier_fhone'],
                    'Grup_id'          => $item['Grup_id'],
                    'Region_id'        => $item['Region_id'],
                    'Supplier_state'   => $item['Supplier_state'],
                    'Supervisor_name'  => $item['Supervisor_name'],
                    'Supervisor_fhone' => $item['Supervisor_fhone'],
                    'agent_name'       => $item['agent_name'],
                    'agent_fhone'      => $item['agent_fhone'],
                    'Supplier_note'    => $item['Supplier_note'],
                    'user_id'          => $item['user_id'],
                    'Supplier_Active'  => $item['Supplier_Active'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_purchase(Request $request)
    {
        Log::info('Purchases', ['0' => $request[0], '1' => $request[1]]);

        try {
            foreach ($request->all() as $index => $item) {
                Log::info('Purchases', ['0' =>  $item['PurchaseH_id']]);
                $uu =   PurchaseHeader::updateOrCreate(["Purchaseh_id"  => $item['PurchaseH_id']], [
                    "Purchaseh_id"           => $item['PurchaseH_id'],
                    "invoice_Number"         => $item['invoice_Number'],
                    "InvoiceType"            => $item['InvoiceType'] == true ? 1 : 0,
                    "Company_invoice_number" => $item['Company_invoice_number'],
                    "Suppliers_id"           => $item['Suppliers_id'],
                    "Store_id"               => $item['Store_id'],
                    "Safe_id"                => $item['Safe_id'],
                    "Name_Emp"               => $item['Name_Emp'],
                    // "image_invoice"          => $item['image_invoice'],
                    "note"                   => $item['note'],
                    "uoser_id"               => $item['uoser_id'],
                    "Sup_total"              => $item['Sup_total'],
                    "Total_Discount"         => $item['Total_Discount'],
                    "Suppliers_Last_balance" => $item['Suppliers_Last_balance'],
                    "Grand_Total"            => $item['Grand_Total'],
                    "Paid"                   => $item['Paid'],
                    "Remaining"              => $item['Remaining'],
                    "Suppliers_Final_balance" => $item['Suppliers_Final_balance'],
                    "tax"                    => $item['tax'],
                    "noCare"                 => $item['noCare'],

                ]);

                PurchaseDetails::where('Purchase_h_id', $item['PurchaseH_id'])->delete();

                foreach ($item['Details'] as $index => $item2) {
                    Log::info('Purchases', ['2' =>  $item['PurchaseH_id']]);

                    $uu =   PurchaseDetails::updateOrCreate(['Purchase_h_id' => $item['PurchaseH_id']], [
                        'id'                  => $item2['PurchaseD_id'],
                        'Purchase_h_id'       => $item2['Purchase_H_id'],
                        'Product_Details_Id'  => $item2['Product_Details_Id'],
                        'ExpireDate'          => $item2['ExpireDate'],
                        'BuyPrice'            => $item2['BuyPrice'],
                        'SellPrice'           => $item2['SellPrice'],
                        'Quantity'            => $item2['Quantity'],
                        'SubTotal'            => $item2['SubTotal'],
                        'Discount'            => $item2['Discount'],
                        'GrandTotal'          => $item2['GrandTotal'],
                        'IsReturn'            => $item2['IsReturn'] == true ? 1 : 0,
                    ]);
                    logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
                }

                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }

    function upload_movement_stocks(Request $request)
    {
        Log::info('upload_movement_stocks', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = MovementStock::updateOrCreate(['Move_Id' =>  $item['Move_Id']], [
                    'Move_Id'        =>  $item['Move_Id'],
                    'FromStore'      =>  $item['FromStore'],
                    'ToStore'        =>  $item['ToStore'],
                    'MoveDate'       =>  $item['MoveDate'],
                    'UserId'         =>  $item['UserId'],
                ]);
                MovementStockDetails::where('MovementStockId',  $item['Move_Id'])->delete();
                foreach ($item['Details'] as $index => $item2) {
                    Log::info('MovementStockDetails', $item2);
                    $uu =   MovementStockDetails::create([
                        'Id'               => $item2['Id'],
                        'MovementStockId'  => $item2['MovementStockId'],
                        'ProductDetailsId' => $item2['ProductDetailsId'],
                        'Quantity'         => $item2['Quantity'],
                    ]);
                    logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
                }
            }
            logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($uu),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }

    function upload_supplier_payments(Request $request)
    {
        Log::info('upload_supplier_payments', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = SupplierPayments::updateOrCreate(['PaymentsSup_id' => $item['PaymentsSup_id']], [
                    'PaymentsSup_id'  => $item['PaymentsSup_id'],
                    'SupplierPay_Id'  => $item['SupplierPay_Id'],
                    'FromeAmount'     => $item['FromeAmount'],
                    'PaidAmount'      => $item['PaidAmount'],
                    'NewAmount'       => $item['NewAmount'],
                    'Pay_note'        => $item['Pay_note'],
                    'Payment_method'  => $item['Payment_method'],
                    'user_id'         => $item['user_id'],
                    'safe_id'         => $item['safe_id'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_user_payment(Request $request)
    {
        Log::info('upload_user_payment', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = ClientPayments::updateOrCreate(['id' => $item['PaymentsCle_id']], [
                    'id'                => $item['PaymentsCle_id'],
                    'clientpay_id'      => $item['ClientPay_Id'],
                    'fromeamount'       => $item['FromeAmount'],
                    'paidamount'        => $item['PaidAmount'],
                    'newamount'         => $item['NewAmount'],
                    'pay_note'          => $item['Pay_note'],
                    'payment_method'       => $item['Payment_method'],
                    'user_id'           => $item['user_id'],
                    'safe_id'           => $item['safe_id'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_stock_settlements(Request $request)
    {
        Log::info('upload_stock_settlements', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = StockSettlement::updateOrCreate(['ID'  => $item['ID']], [
                    'ID'                 => $item['ID'],
                    'NoSettlement'       => $item['NoSettlement'],
                    'ProductDetailsId'   => $item['ProductDetailsId'],
                    'SettlementDate'     => $item['SettlementDate'],
                    'StockNow'           => $item['StockNow'],
                    'StockNew'           => $item['StockNew'],
                    'QuantityDifference' => $item['QuantityDifference'],
                    'BayProduct'        => $item['BayProduct'],
                    'totalCost'         => $item['totalCost'],
                    'StoreID'           => $item['StoreID'],
                    'UserID'            => $item['UserID'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_settlements(Request $request)
    {
        Log::info('upload_Statements', ['0' => $request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Statements::updateOrCreate(['Statement_id' => $item['Statement_id']], [
                    'Statement_id'          => $item['Statement_id'],
                    'Emp_id'                => $item['Emp_id'],
                    'Statements_Type'       => $item['Statements_Type'],
                    'Statements_TypeDetils' => $item['Statements_TypeDetils'],
                    'Amount'                => $item['Amount'],
                    'note'                  => $item['note'],
                    'user_id'               => $item['user_id'],
                    'safe_id'               => $item['safe_id'],

                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_shift(Request $request)
    {
        Log::info('upload_shift', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = Shift::updateOrCreate(['id'  => $item['Shift_Id']], [
                    'id'      => $item['Shift_Id'],
                    'UserId'        => $item['UserId'],
                    'SafeId'        => $item['SafeId'],
                    'StartDate'     => $item['StartDate'],
                    'FirstBalance'  => $item['FirstBalance'],
                    'EndDate'       => $item['EndDate'],
                    'LastBalance'   => $item['LastBalance'],
                    'totalSaels'     => $item['totalSaels'],
                    'totalRetrnSaels'       => $item['totalRetrnSaels'],
                    'totalPorshes'  => $item['totalPorshes'],
                    'totalRetrnProsh' => $item['totalRetrnProsh'],
                    'totalSalfeat'    => $item['totalSalfeat'],
                    'TotalIncome'     => $item['TotalIncome'],
                    'TotalExprte'     => $item['TotalExprte'],

                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_product_moves(Request $request)
    {
        Log::info('upload_product_moves', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = ProductMoves::updateOrCreate(['Shift_Id'  => $item['Shift_Id'],], [
                    'Product_Moves_ID'  => $item['Product_Moves_ID'],
                    'Product_ID'        => $item['Product_ID'],
                    'Quantity'      => $item['Quantity'],
                    'BuyPrice'      => $item['BuyPrice'],
                    'SellPrice'     => $item['SellPrice'],
                    'Profit'        => $item['Profit'],
                    'NumperMove'    => $item['NumperMove'],
                    'user_ID'       => $item['user_ID'],
                    'InvoiceType'   => $item['InvoiceType']
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_permission_screnes(Request $request)
    {
        Log::info('upload_permission_screnes', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = PermissionScrene::updateOrCreate(['PermissionID' => $item['PermissionID']], [

                    'PermissionID'      => $item['PermissionID'],
                    'userID'            => $item['userID'],
                    'NO_Screne'         => $item['NO_Screne'],
                    'Srene'             => $item['Srene'] == true ? 1 : 0,
                    'add'               => $item['add_'] == true ? 1 : 0,
                    'Ediet'             => $item['Ediet'] == true ? 1 : 0,
                    'Delaet'            => $item['Delaet'] == true ? 1 : 0
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_permissions_saels(Request $request)
    {
        Log::info('upload_permissions_saels', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = Permissions_Saels::updateOrCreate(['Permissions_Saels_id' => $item['Permissions_Saels_id']], [
                    'Permissions_Saels_id'                        => $item['Permissions_Saels_id'],
                    'User_id'                   => $item['User_id'],
                    'Passwrd_Selas'             => $item['Passwrd_Selas'],
                    'Saels_Leve'                => $item['Saels_Leve'] == true ? 1 : 0,
                    'Saels_Delvery'             => $item['Saels_Delvery'] == true ? 1 : 0,
                    'Saels_Agel'                => $item['Saels_Agel'] == true ? 1 : 0,
                    'Descuont_Product'          => $item['Descuont_Product'] == true ? 1 : 0,
                    'Descuont_G'                => $item['Descuont_G'] == true ? 1 : 0,
                    'ADD_G'                     => $item['ADD_G'] == true ? 1 : 0,
                    'ADD_M'                     => $item['ADD_M'] == true ? 1 : 0,
                    'Descount_M'                => $item['Descount_M'] == true ? 1 : 0,
                    'Prent_Selas'               => $item['Prent_Selas'] == true ? 1 : 0,
                    'Seals_Count'               => $item['Seals_Count'],
                    'bay_Tayp'                  => $item['bay_Tayp'] == true ? 1 : 0,
                    'Edite_Saels_Dlevry'        => $item['Edite_Saels_Dlevry'] == true ? 1 : 0,
                    'Done_1_Saels_Delvry'       => $item['Done_1_Saels_Delvry'] == true ? 1 : 0,
                    'Done_ALL_Delvry'           => $item['Done_ALL_Delvry'] == true ? 1 : 0,
                    'Cancel_1_Delvry'           => $item['Cancel_1_Delvry'] == true ? 1 : 0,
                    'DeleteCode'                => $item['DeleteCode'] == true ? 1 : 0,
                    'SershSaels'                => $item['SershSaels'] == true ? 1 : 0,
                    'TotalSaelsDelvry'          => $item['TotalSaelsDelvry'] == true ? 1 : 0,
                    'TotalSaels'                => $item['TotalSaels'] == true ? 1 : 0,
                    'EditeCostDelvry'           => $item['EditeCostDelvry'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_partners(Request $request)
    {
        Log::info('upload_partners', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = Partners::updateOrCreate(['PartnersID'    => $item['PartnersID']], [
                    'PartnersID'    => $item['PartnersID'],
                    'name'          => $item['name'],
                    'Fhone'         => $item['Fhone'],
                    'FromeBalnce'   => $item['FromeBalnce'],
                    'nowBalnce'     => $item['nowBalnce'],
                    'percent_store' => $item['percent_store'],
                    'steos'         => $item['steos'],
                    'note'          => $item['note'],
                    'userID'        => $item['userID'],
                    'PartnersActeve' => $item['PartnersActeve'],

                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_offer_bays(Request $request)
    {
        Log::info('upload_offer_bays', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = Offer_Bay::updateOrCreate(['Offer_Bay_Id' => $item['Offer_Bay_Id'],], [
                    'Offer_Bay_Id'  => $item['Offer_Bay_Id'],
                    'FromTotal'     => $item['FromTotal'],
                    'ToTotal'       => $item['ToTotal'],
                    'FromDate'      => $item['FromDate'],
                    'ToDate'        => $item['ToDate'],
                    'Discount'      => $item['Discount'],
                    'userId'        => $item['userId'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_movement_balances(Request $request)
    {
        Log::info('upload_movement_balances', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = MovementBalance::updateOrCreate(['id' => $item['Con_id']], [
                    'id'        => $item['Con_id'],
                    'from_safe_id'  => $item['from_safe_id'],
                    'to_safe_id'    => $item['to_safe_id'],
                    'balance_frome' => $item['balance_frome'],
                    'balance_To'    => $item['balance_To'],
                    'balance_frome_after' => $item['balance_frome_after'],
                    'balance_To_after'    => $item['balance_To_after'],
                    'balance_convert'     => $item['balance_convert'],
                    'user_id'             => $item['user_id'],

                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_move_partners(Request $request)
    {
        Log::info('upload_move_partners', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = Move_Partners::updateOrCreate(['Move_PartnersID'  => $item['Move_PartnersID']], [
                    'Move_PartnersID'  => $item['Move_PartnersID'],
                    'PartnersID'       => $item['PartnersID'],
                    'StetMove'         => $item['StetMove'],
                    'FromeBalncce'     => $item['FromeBalncce'] == true ? 1 : 0,
                    'endBalance'       => $item['endBalance'] == true ? 1 : 0,
                    'moveBalnce'       => $item['moveBalnce'] == true ? 1 : 0,
                    'note'             => $item['note'] == true ? 1 : 0,
                    'userID'           => $item['userID'] == true ? 1 : 0,
                    'safeID'           => $item['safeID'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_income_types(Request $request)
    {
        Log::info('upload_income_types', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = incomeTypes::updateOrCreate(['incomeT_id'  => $item['incomeT_id']], [
                    'incomeT_id'  => $item['incomeT_id'],
                    'incT_name'   => $item['incT_name'],
                    'incT_note'   => $item['incT_note'],
                    'user_id'     => $item['user_id'],
                    'incT_acteve' => $item['incT_acteve'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_income(Request $request)
    {
        Log::info('upload_income', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = income::updateOrCreate(['income_id' => $item['income_id']], [
                    'income_id'     => $item['income_id'],
                    'incomeTid'     => $item['incomeTid'],
                    'income_Amount' => $item['income_Amount'],
                    'income_note'   => $item['income_note'],
                    'user_id'       => $item['user_id'],
                    'income_acteve' => $item['income_acteve'] == true ? 1 : 0,
                    'Safe_id'       => $item['Safe_id'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_expenses_types(Request $request)
    {
        Log::info('upload_expenses_types', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = ExpensesTypes::updateOrCreate(['ExpensesT_id'  => $item['ExpensesT_id']], [
                    'ExpensesT_id'  => $item['ExpensesT_id'],
                    'Exp_name'      => $item['Exp_name'],
                    'Exp_note'      => $item['Exp_note'],
                    'user_id'       => $item['user_id'],
                    'Exp_Acteve'    => $item['Exp_Acteve'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_expenses(Request $request)
    {
        Log::info('upload_expenses', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = Expenses::updateOrCreate(['Expenses_id'  => $item['Expenses_id']], [
                    'Expenses_id'  => $item['Expenses_id'],
                    'ExpT_id'     => $item['ExpT_id'],
                    'Exp_Amount' => $item['Exp_Amount'],
                    'Exps_note'   => $item['Exps_note'],
                    'user_id'       => $item['user_id'],
                    'Expenses_acteve' => $item['Expenses_acteve'] == true ? 1 : 0,
                    'safe_id'       => $item['safe_id']
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_movement_bank(Request $request)
    {
        Log::info('upload_MovementBank', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {

                $uu = MovementBank::updateOrCreate(['bank_id' => $item['bank_id']], [
                    'bank_id'             => $item['bank_id'],
                    'from_bank_id'        => $item['from_bank_id'],
                    'to_bank_id'          => $item['to_bank_id'],
                    'balance_frome'       => $item['balance_frome'],
                    'balance_To'          => $item['balance_To'],
                    'balance_frome_after' => $item['balance_frome_after'],
                    'balance_To_after'    => $item['balance_To_after'],
                    'balance_convert'     => $item['balance_convert'],
                    'user_id'             => $item['user_id']
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_pricing(Request $request)
    {
        Log::info('upload_pricing', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = pricing::updateOrCreate(['pricing_id' => $item['pricing_id']], [
                    'pricing_id'             => $item['pricing_id'],
                    'pricing_name'        => $item['pricing_name'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_region(Request $request)
    {
        Log::info('upload_region', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = region::updateOrCreate(['id' => $item['Region_id']], [
                    'id'               => $item['Region_id'],
                    'region_name_ar'   => $item['Region_name'],
                    'region_name_en'   => $item['Region_name'],
                    'city_id'       => $item['City_id'],
                    'main'          => null,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_cities(Request $request)
    {
        Log::info('upload_cities', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = cities::updateOrCreate(['id' => $item['City_id']], [
                    'id'            => $item['City_id'],
                    'city_name_ar'  => $item['City_name'],
                    'city_name_en'  => $item['City_name'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_users(Request $request)
    {
        Log::info('upload_users', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = UserAdmin::updateOrCreate(['id' => $item['id_user']], [
                    'id'        => $item['id_user'],
                    'username'  => $item['user_name'],
                    'password'  => $item['user_pass'],
                    'emp_id'    => $item['user_Emp_id'],
                    'user_type' => $item['user_Type'],
                    'note'      => $item['use_note'],
                    'active'    => $item['user_Active'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_safe(Request $request)
    {
        Log::info('upload_safe', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = Safe::updateOrCreate(['id' => $item['safe_id']], [
                    'id'        => $item['safe_id'],
                    'safe_name'  => $item['safe_name'],
                    'branch_id'  => $item['bransh_id'],
                    'opening_balance'    => $item['Opening_balance'],
                    'balance_now' => $item['balance_now'],
                    'user_id'      => $item['user_id'],
                    'save_active'    => $item['save_acteve'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_branch(Request $request)
    {
        Log::info('upload_branch', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = Branch::updateOrCreate(['id' => $item['Branch_id']], [
                    'id'           => $item['Branch_id'],
                    'branch_name'  => $item['Branch_name'],
                    'branch_bus'   => $item['Branch_nameBus'],
                    'branch_phone'   => $item['Branch_fhone'],
                    'branch_address' => $item['Branch_Address'],
                    'branch_note'    => $item['Branch_note'],
                    'user_id'        => $item['user_id'],
                    'branch_active'  => $item['Branch_Active'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
    function upload_userdesck(Request $request)
    {
        Log::info('upload_userdesck', ['0' => $request->all()]);
        try {
            foreach ($request->all() as $index => $item) {
                $uu = userdesck::updateOrCreate(['id' => $item['id_user']], [
                    'id'          => $item['id_user'],
                    'user_name'   => $item['user_name'],
                    'user_pass'   => $item['user_pass'],
                    'user_Type'   => $item['user_Emp_id'],
                    'user_Emp_id' => $item['user_Type'],
                    'use_note'    => $item['use_note'],
                    'user_Active' => $item['user_Active'] == true ? 1 : 0,
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }

    function upload_product_header_details(Request $request)
    {
        Log::info('upload_product_header_details', ['0' => $request->all()]);
        Log::error($request[0][0]['Products_ID']);
        try {
            $uu = ProductHeader::updateOrCreate(['id' => $request[0][0]['Products_ID']], [
                'id'                => $request[0][0]['Products_ID'],
                'product_name'      => $request[0][0]['Products_name'],
                'product_category'  => $request[0][0]['Products_Sup_id'],
                'product_acteve'    => ($request[0][0]['Products_Acteve'] == true) ? 1 : ($request[0][0]['Products_Acteve'] == false ? 0 : $request[0][0]['Products_Acteve']),
                'product_isscale'   => ($request[0][0]['Products_IsScale'] == true) ? 1 : ($request[0][0]['Products_IsScale'] == false ? 0 : $request[0][0]['Products_IsScale']),
                'product_online'    => ($request[0][0]['Products_Onlein'] == true) ? 1 : ($request[0][0]['Products_Onlein'] == false ? 0 : $request[0][0]['Products_Onlein']),
                'product_tax'       => $request[0][0]['Products_Tax'],
                'product_limit'     => $request[0][0]['Products_Lemt'],
                'user_id'           => $request[0][0]['user_id'],
                'product_limit_day' => $request[0][0]['Products_lemt_day'],
                'product_note'      => $request[0][0]['Products_note'],
            ]);
            ProductDetails::where('product_header_id', $request[0][0]['Products_ID'])->delete();
            foreach ($request[1] as $index => $item) {
                Log::info('ProductDetails', $item);
                $image = $item['ProductsD_image'] != null ? uploadbase64images('products', $item['ProductsD_image']) : null;
                $uu =   ProductDetails::create([
                    'id'                 => $item['ProductD_id'],
                    'product_header_id'  => $item['Product_id'],
                    'productd_unit_id'   => $item['ProductsD_unit_id'],
                    'productd_barcode'   => $item['ProductsD_Barcode'],
                    'productd_size'      => $item['ProductsD_Size'],
                    'productd_bay'       => $item['ProductsD_Bay'],
                    'productd_Sele1'     => $item['ProductsD_Sele1'],
                    'productd_Sele2'     => $item['ProductsD_Sele2'],
                    'productd_fast_Sele' => ($item['ProductsD_fast_Sele'] == true) ? 1 : 0,
                    'productd_UnitType'  => $item['ProductsD_UnitType'],
                    'productd_image'     => $image,
                    'isoffer'            => ($item['IsOffer'] == true) ? 1 : 0,
                    'productd_online'    => ($item['Product_Onlein'] == true) ? 1 : 0,
                    'maxqty'             => $item['MaxQuntte'],
                    'EndOferDate'        => Carbon::parse($item['EndOferDate'])->format('Y-m-d H:i:s'),
                ]);
                Log::error(Carbon::parse($item['EndOferDate'])->format('Y-m-d H:i:s'));
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($uu),  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }
    }
}
