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
use App\Http\Resources\CommentResource;
use App\Models\CateoryApp;
use App\Models\comment;
use App\Models\Coupon;
use App\Models\DeliveryDetails;
use App\Models\DeliveryHeader;
use App\Models\Employee;
use App\Models\notifiction;
use App\Models\slider;
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
            logsync::create(['type' => "Error", 'data' => null,  'massage' =>  json_encode($e->getMessage())]);

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
                $image = $item['ProductsD_image'] != null ? uploadbase64images('products', $item['ProductsD_image']) : null;
                $uu =   ProductDetails::updateOrCreate(['id' => $item['ProductD_id']], [
                    'id'                 => $item['ProductD_id'],
                    'product_header_id'  => $item['Product_id'],
                    'productd_unit_id'   => $item['ProductsD_unit_id'],
                    'productd_barcode'   => $item['ProductsD_Barcode'],
                    'productd_size'      => $item['ProductsD_Size'],
                    'productd_bay'       => $item['ProductsD_Bay'],
                    'productd_Sele1'     => $item['ProductsD_Sele1'],
                    'productd_Sele2'     => $item['ProductsD_Sele2'],
                    'productd_fast_Sele' => ($item['ProductsD_fast_Sele'] == true) ? 1 : ($item['ProductsD_fast_Sele'] == false ? 0 : $item['ProductsD_fast_Sele']),
                    'productd_UnitType'  => $item['ProductsD_UnitType'],
                    'productd_image'     => $image,
                    'isoffer'            => ($item['IsOffer'] == true) ? 1 : ($item['IsOffer'] == false ? 0 : $item['IsOffer']),
                    'productd_online'    => ($item['Product_Onlein'] == true) ? 1 : ($item['Product_Onlein'] == false ? 0 : $item['Product_Onlein']),
                    'maxqty'             => $item['MaxQuntte'],
                    'EndOferDate'        => Carbon::parse($item['EndOferDate'])->format('Y-m-d H:i:s'),
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



    function uploadsalseheader(Request $request)
    {
        Log::info('uploadsalseheader', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   SalesHeader::updateOrCreate(["id"  => $item['SalesHeader_ID'],], [
                    "id"            => $item['SalesHeader_ID'],
                    "invoicenumber" => $item['InvoiceNumber'],
                    "coupon_id"     => $item['coupon_id'],
                    "type_order"    => $item['Type_Order'],
                    "comment_id"    => $item['comment_ID'],
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
            SalesDetails::where('sale_header_id', $request[0]['SalesHeader_ID'])->delete();
            foreach ($request->all() as $index => $item) {
                $uu =   SalesDetails::updateOrCreate(['id' => $item['SalesDetails_ID']], [
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
    function uploadsdeliveryheader(Request $request)
    {
        Log::info('DeliveryHeader', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   DeliveryHeader::updateOrCreate(["id"  => $item['SalesHeader_ID'],], [
                    "id"            => $item['SalesHeader_ID'],
                    "invoicenumber" => $item['InvoiceNumber'],
                    "coupon_id"     => $item['coupon_id'],
                    "type_order"    => $item['Type_Order'],
                    "comment_id"    => $item['comment_ID'],
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
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp(null, 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => json_encode($item),  'massage' =>  json_encode($e)]);
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
                    'active'   => $item['active'],
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
    function downsdeliveryheader(Request $request)
    {
        $data = DeliveryHeader::get();
        return    Resp($data, 'success', 200, true);
    }
    function downdeliverydetails(Request $request)
    {
        $data = DeliveryDetails::get();
        return    Resp($data, 'success', 200, true);
    }
    function downcomment()
    {
        $data = comment::whereHas('salesheader')->get();
        return    Resp(CommentResource::collection($data), 'success', 200, true);
    }
    function sendnotification(Request $request)
    {
        $image = $request['image'] != null ? uploadbase64images('products', $request['image']) : null;
        $result = notificationFCM($request['title'], $request['body'], $request['user'], null,  $image);
        $notifi =  notifiction::created(['title' => $request['title'], 'body' => $request['body'], 'image' =>  $image, 'results' => $result]);
        return    Resp($notifi , 'success', 200, true);

    }
    function getfsm_notification()
    {
        // dd('');
        // $userfsm = user::where('fsm','!=',null)->pluck(['id','fsm','source_id']);
        $userfsm = user::where('fsm', '!=',null)->select('id','fsm','source_id')->get()->toarray();
        return    Resp($userfsm , 'success', 200, true);
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
                $uu =   Employee::updateOrCreate(['id' => $item['id']], [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'phone' => $item['phone'],
                    'identite' => $item['identite'],
                    'region_id' => $item['region_id'],
                    'paytype_id' => $item['paytype_id'],
                    'pay_sel' => $item['pay_sel'],
                    'total_houre' => $item['total_houre'],
                    'job_id' => $item['job_id'],
                    'branch_id' => $item['branch_id'],
                    'data_active' => $item['data_active'],
                    'data_unactive' => $item['data_unactive'],
                    'note' => $item['note'],
                    'image' => $item['image'],
                    'active' => $item['active'],

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
                $uu =   CateoryApp::updateOrCreate(['id' => $item['id']], [
                    'id'          => $item['id'],
                    'parent_id'   => $item['parent_id'],
                    'name'        => $item['name'],
                    'image'       => $item['image'],
                    'note'        => $item['note'],
                    'cat_active'  => $item['cat_active'],

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
