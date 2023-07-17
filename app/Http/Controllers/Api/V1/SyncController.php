<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use Carbon\Carbon;
use App\Models\unit;
use App\Models\User;
use App\Models\logsync;
use App\Models\Category;
use App\Models\SalesHeader;
use Illuminate\Support\Str;
use App\Models\SalesDetails;
use Illuminate\Http\Request;
use App\Models\ProductHeader;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SyncController extends Controller
{
    function client(Request $request)
    {
        try {
            Log::warning($request->all());
            foreach ($request->all() as $index => $item) {
                $rules['Client_fhoneWhats'] = 'unique:users';
                $messages = [
                    'required'  => 'error required (:attribute)',
                    'unique'    => 'error unique (:attribute)',
                ];
                $validator = Validator::make($item, $rules, $messages);
                if ($validator->fails()) {
                    $errors[$index] = ['message' => $validator->messages(), 'Client_id' => $item['Client_id']];
                    continue;
                }
                $user = User::create([
                    'client_fhonewhats'   => $item['Client_fhoneWhats'],
                    'source_id'           => $item['Client_id'],
                    'client_name'         => $item['Client_name'],
                    'client_Balanc'       => $item['Client_Balanc'],
                    'client_points'       => $item['Client_points'],
                    'client_fhoneLeter'   => $item['Client_fhoneLeter'],
                    'client_EntiteNumber' => $item['Client_EntiteNumber'],
                    'region_id'           => $item['Region_id'],
                    'lat_mab'             => $item['Lat_mab'],
                    'long_mab'            => $item['Long_mab'],
                    'client_state'        => $item['Client_state'],
                    'client_Credit_Limit' => $item['Client_Credit_Limit'],
                    'default_Sael'        => $item['default_Sael'],
                    'client_note'         => $item['Client_note'],
                    'client_code'         => $item['Client_code'],
                    'categoryAPP'         => $item['CategoryAPP'],
                    'client_Active'       => $item['Client_Active'],
                    'created_at'          => $item['caret_data']
                ]);
                $results[$index] = ['id' => $user->id, 'source_id' => $user->source_id];
            logsync::create(['type' => 'success', 'data' => json_encode($item), 'massage' => null]);

            }

            $data = ['users_online' =>   User::where('source_id', null)->get() ?? [], 'results' => $results ?? [], 'errors' => $errors ?? []];

            return  $data;
        } catch (\Exception $e) {
            logsync::create(['type' => "Error", 'data'=> null,  'massage' =>  json_encode($e->getMessage())]);

            Log::error($e->getMessage());
        }
    }
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
    function uploadproductsheader(Request $request)
    {
        Log::info('uploadproductsheader ', $request->all());

        try {
            foreach ($request->all() as $index => $item) {
                $uu =   ProductHeader::updateOrCreate( ['id'=> $item['Products_ID']],[
                    'id'                => $item['Products_ID'],
                    'product_name'      => $item['Products_name'],
                    'product_category'  => $item['Products_Sup_id'],
                    'product_acteve'    => ($item['Products_Acteve'] == true) ?1:($item['Products_Acteve'] == false?0:$item['Products_Acteve']),
                    'product_isscale'   => ($item['Products_IsScale'] == true) ?1:($item['Products_IsScale'] == false?0:$item['Products_IsScale']),
                    'product_online'    => ($item['Products_Onlein'] == true) ?1:($item['Products_Onlein'] == false?0:$item['Products_Onlein']),
                    'product_tax'       => $item['Products_Tax'],
                    'product_limit'     => $item['Products_Lemt'],
                    'user_id'           => $item['user_id'],
                    'product_limit_day' => $item['Products_lemt_day'],
                    'product_note'      => $item['Products_note'],
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
    function uploadproductsdetails(Request $request)
    {
        Log::info('uploadproductsdetails ', $request->all());

        try {
            foreach ($request->all() as $index => $item) {
                $image = $item['ProductsD_image'] != null ? uploadbase64images('products',$item['ProductsD_image']):null;
                $uu =   ProductDetails::updateOrCreate(['id'=> $item['ProductD_id']],[
                    'id'                 => $item['ProductD_id'],
                    'product_header_id'  => $item['Product_id'],
                    'productd_unit_id'   => $item['ProductsD_unit_id'],
                    'productd_barcode'   => $item['ProductsD_Barcode'],
                    'productd_size'      => $item['ProductsD_Size'],
                    'productd_bay'       => $item['ProductsD_Bay'],
                    'productd_Sele1'     => $item['ProductsD_Sele1'],
                    'productd_Sele2'     => $item['ProductsD_Sele2'],
                    'productd_fast_Sele' => ($item['ProductsD_fast_Sele'] == true) ?1:($item['ProductsD_fast_Sele'] == false?0:$item['ProductsD_fast_Sele']),
                    'productd_UnitType'  => $item['ProductsD_UnitType'],
                    'productd_image'     => $image,
                    'isoffer'            => ($item['IsOffer'] == true) ?1:($item['IsOffer'] == false?0:$item['IsOffer']),
                    'productd_online'    => ($item['Product_Onlein'] == true) ?1:($item['Product_Onlein'] == false?0:$item['Product_Onlein']),
                    'maxqty'             => $item['MaxQuntte'],
                    'EndOferDate'        => Carbon::parse($item['EndOferDate'])->format('Y-m-d H:i:sa'),
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
    function uploadunits(Request $request)
    {
           Log::info('upload UNIT client SyncController', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   unit::updateOrCreate([ "id" => $item['unit_id']],[
                    "id"            => $item['unit_id'],
                    "unit_name"     => $item['unit_name'],
                    "unit_note"     => $item['unit_note'],
                    "unit_active"   => ($item['unit_Active'] == true) ?1:($item['unit_Active'] == false?0:$item['unit_Active']),
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
                $image = $item['image'] != null ? uploadbase64images('category',$item['image']):null;
                $succ =   Category::updateOrCreate(["id" => $item['Category_id']],[
                    "id"              => $item['Category_id'],
                    "parent_id"       => $item['parntID'],
                    "category_name"   => $item['Category_name'],
                    "image"           => $image,
                    "category_note"   => $item['Category_note'],
                    "category_active" => ($item['Category_Active'] == true) ?1:($item['Category_Active'] == false?0:$item['Category_Active']),
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



    function uploadsalseheader(Request $request)
    {


        Log::info('uploadsalseheader', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   SalesHeader::create([
                    "id"            => $item['id'],
                    "invoicenumber" => $item['invoicenumber'],
                    "coupon_id"     => $item['coupon_id'],
                    "type_order"    => $item['type_order'],
                    "comment_id"    => $item['comment_id'],
                    "invoicetype"   => $item['invoicetype'],
                    "invoicedate"   => $item['invoicedate'],
                    "client_id"     => $item['client_id'],
                    "lastbalance"   => $item['lastbalance'],
                    "finalbalance"  => $item['finalbalance'],
                    "user_id"       => $item['user_id'],
                    "store_id"      => $item['store_id'],
                    "safe_id"       => $item['safe_id'],
                    "status"        => $item['status'],
                    "employ_id"     => $item['employ_id'],
                    "dis_point_active" => $item['dis_point_active'],
                    "paytayp"       => $item['paytayp'],
                    "subtotal"      => $item['subtotal'],
                    "totaldiscount" => $item['totaldiscount'],
                    "discount_g"    => $item['discount_g'],
                    "discount_f"    => $item['discount_f'],
                    "total_add_amount" => $item['total_add_amount'],
                    "add_amount_g"  => $item['add_amount_g'],
                    "add_amount_f"  => $item['add_amount_f'],
                    "discount_product" => $item['discount_product'],
                    "discount_sales" => $item['discount_sales'],
                    "discount_point" => $item['discount_point'],
                    "grandtotal"     => $item['grandtotal'],
                    "paid"           => $item['paid'],
                    "remaining"      => $item['remaining'],
                    "total_profit"   => $item['total_profit'],
                    "note"           => $item['note'],
                    "deliverycost"   => $item['deliverycost'],
                    "satus_delivery" => $item['satus_delivery'],
                    "sales_online"   => $item['sales_online']
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
    function uploadsalsedetails(Request $request)
    {
        Log::info('uploadsalsedetails', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   SalesDetails::create([
                    'id'                 => $item['id'],
                    'sale_header_id'     => $item['sale_header_id'],
                    'product_details_id' => $item['product_details_id'],
                    'buyprice'           => $item['buyprice'],
                    'sellprice'          => $item['sellprice'],
                    'quantity'           => $item['quantity'],
                    'subtotal'           => $item['subtotal'],
                    'discount'           => $item['discount'],
                    'grandtotal'         => $item['grandtotal'],
                    'profit'             => $item['profit']
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
}
