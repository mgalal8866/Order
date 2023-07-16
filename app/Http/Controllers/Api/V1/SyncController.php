<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\unit;
use App\Models\User;
use App\Models\logsync;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductDetails;
use App\Models\ProductHeader;
use App\Models\SalesDetails;
use App\Models\SalesHeader;
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
            }

            $data = ['users_online' =>   User::where('source_id', null)->get() ?? [], 'results' => $results ?? [], 'errors' => $errors ?? []];
            return  $data;
        } catch (\Exception $e) {
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
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   ProductHeader::create([
                    'id'                => $item['id'],
                    'product_name'      => $item['product_name'],
                    'product_category'  => $item['product_category'],
                    'product_acteve'    => $item['product_acteve'],
                    'product_isscale'   => $item['product_isscale'],
                    'product_online'    => $item['product_online'],
                    'product_tax'       => $item['product_tax'],
                    'product_limit'     => $item['product_limit'],
                    'user_id'           => $item['user_id'],
                    'product_limit_day' => $item['product_limit_day'],
                    'product_note'      => $item['product_note'],
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
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   ProductDetails::create([
                    'id'                 => $item['id'],
                    'product_header_id'  => $item['product_header_id'],
                    'productd_unit_id'   => $item['productd_unit_id'],
                    'productd_barcode'   => $item['productd_barcode'],
                    'productd_size'      => $item['productd_size'],
                    'productd_bay'       => $item['productd_bay'],
                    'productd_Sele1'     => $item['productd_Sele1'],
                    'productd_Sele2'     => $item['productd_Sele2'],
                    'productd_fast_Sele' => $item['productd_fast_Sele'],
                    'productd_UnitType'  => $item['productd_UnitType'],
                    'productd_image'     => $item['productd_image'],
                    'isoffer'            => $item['isoffer'],
                    'productd_online'    => $item['productd_online'],
                    'maxqty'             => $item['maxqty'],
                    'EndOferDate'        => $item['EndOferDate'],
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
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   unit::create([
                    "id"            => $item['id'],
                    "unit_name"     => $item['unit_name'],
                    "unit_note"     => $item['unit_note'],
                    "unit_active"   => $item['unit_active'],
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
        try {
            foreach ($request->all() as $index => $item) {
                $succ =   Category::create([
                    "id"              => $item['id'],
                    "parent_id"       => $item['parent_id'],
                    "category_name"   => $item['category_name'],
                    "image"           => $item['image'],
                    "category_note"   => $item['category_note'],
                    "category_active" => $item['category_active'],
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
