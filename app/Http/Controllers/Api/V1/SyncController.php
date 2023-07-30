<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use Carbon\Carbon;
use App\Models\jobs;
use App\Models\unit;
use App\Models\User;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Coupon;
use App\Models\slider;
use App\Models\comment;
use App\Models\logsync;
use App\Models\setting;
use App\Models\Category;
use App\Models\deferred;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\CateoryApp;
use App\Models\notifiction;
use App\Models\SalesHeader;
use Illuminate\Support\Str;
use App\Models\SalesDetails;
use App\Models\UserDelivery;
use Illuminate\Http\Request;
use App\Models\ProductHeader;
use App\Models\DeliveryHeader;
use App\Models\ProductDetails;
use App\Models\DeliveryDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\clientsyncResource;
use App\Http\Resources\UserDelivery as ResourcesUserDelivery;

class SyncController extends Controller
{
    function client(Request $request)
    {
        try {
            Log::warning($request->all());
            $results=[];
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
                $user = User::updateOrCreate(['source_id'   => $item['Client_id']],[
                    'client_fhonewhats'   => $item['Client_fhoneWhats'],
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
                    'client_code'         => $item['Client_code'],
                    'categoryAPP'         => $item['CategoryAPP'],
                    'client_Active'       => $item['Client_Active'],
                    'created_at'          => $item['caret_data']
                ]);
                // Log::warning($request->all());

                $results[$index] = ['id' => $user->id, 'source_id' => $user->source_id];
                logsync::create(['type' => 'success', 'data' => json_encode($item), 'massage' => null]);
            }

            $data = ['users_online' =>   clientsyncResource::collection(User::where('source_id', null)->get()) ?? [], 'results' => $results ?? [], 'errors' => $errors ?? []];

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
        Log::info('DeliveryHeader', ['0' => $request[0],'1'=> $request[1]]);

        try {
                $uu =   DeliveryHeader::updateOrCreate(["id"  => $request[0][0]['SalesHeader_ID'],], [
                    "id"            => $request[0][0]['SalesHeader_ID'],
                    "invoicenumber" => $request[0][0]['InvoiceNumber'],
                    "coupon_id"     => $request[0][0]['coupon_id'],
                    "type_order"    => $request[0][0]['Type_Order'],
                    "invoicetype"   => $request[0][0]['InvoiceType'],
                    "invoicedate"   => $request[0][0]['InvoiceDate'],
                    "client_id"     => $request[0][0]['Client_ID'],
                    "lastbalance"   => $request[0][0]['LastBalance'],
                    "finalbalance"  => $request[0][0]['finalbalance'],
                    "user_id"       => $request[0][0]['User_ID'],
                    "store_id"      => $request[0][0]['Store_ID'],
                    "safe_id"       => $request[0][0]['Safe_ID'],
                    "status"        => $request[0][0]['Status'],
                    "employ_id"     => $request[0][0]['Employ_ID'],
                    "dis_point_active" => $request[0][0]['Dis_Point_Active'],
                    "paytayp"       => $request[0][0]['PayTayp'],
                    "subtotal"      => $request[0][0]['SubTotal'],
                    "totaldiscount" => $request[0][0]['Total_Discount'],
                    "discount_g"    => $request[0][0]['Discount_G'],
                    "discount_f"    => $request[0][0]['Discount_F'],
                    "total_add_amount" => $request[0][0]['Total_Add_Amount'],
                    "add_amount_g"  => $request[0][0]['Add_Amount_G'],
                    "add_amount_f"  => $request[0][0]['Add_Amount_F'],
                    "discount_product"=> $request[0][0]['Discount_Prduct'],
                    "discount_sales" => $request[0][0]['Discount_Sales'],
                    "discount_point" => $request[0][0]['Discount_Point'],
                    "grandtotal"     => $request[0][0]['GrandTotal'],
                    "paid"           => $request[0][0]['Paid'],
                    "remaining"      => $request[0][0]['Remaining'],
                    "total_profit"   => $request[0][0]['Total_Profit'],
                    "note"           => $request[0][0]['note'],
                    "deliverycost"   => $request[0][0]['DelverCost'],
                    "satus_delivery" => $request[0][0]['Status_Delvery'],
                    "sales_online"   => $request[0][0]['SalesOnlain']
                ]);
                DeliveryDetails::where( 'sale_header_id' ,$request[0][0]['SalesHeader_ID'])->delete();
                foreach ($request[1] as $index => $item) {
                    Log::info('DeliveryHeader', $item);
                    $uu =   DeliveryDetails::create([
                        'sale_header_id'     => $request[0][0]['SalesHeader_ID'],
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
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
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
    function deleteslider($id)
    {
        // Log::info('uploadslider', $request->all());
        try {
            $slider=  slider::find($id);
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
        Log::info('uploadcategoryapp', $request->all());
        // $image = $request['image'] != null ? uploadbase64images('products', $request['image']) : null;
        // $result = notificationFCM($request['title'], $request['body'], $request['user'], null,  $image);
        // $notifi =  notifiction::created(['title' => $request['title'], 'body' => $request['body'], 'image' =>  $image, 'results' => $result]);
        // return    Resp($notifi , 'success', 200, true);

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
                    'image'       =>  $image ,
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
        $deferred =deferred::get();
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
            logsync::create(['type' => "Error", 'data' => $uu ,  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }

    }
    function upload_jobs(Request  $request)
    {

        Log::info('upload_jobs', $request->all());
        try {
            foreach ($request->all() as $index => $item) {
                $uu =   jobs::updateOrCreate(['id' => $item['jobs_id']], [
                    'jobs_id'      => $item['jobs_id'],
                    'jobs_name'    => $item['jobs_name'],
                    'jobs_Active'  => $item['jobs_Active'],
                ]);
                logsync::create(['type' => 'success', 'data' => json_encode($uu), 'massage' => null]);
            }
            return Resp('', 'Success', 200, true);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $e = $exception->errorInfo;
            logsync::create(['type' => "Error", 'data' => $uu ,  'massage' =>  json_encode($e)]);
            return    Resp(null, 'Error', 400, true);
        }

    }
    function upload_setting(Request $request)
    {
        Log::info('uploadsetting', ['0'=>$request->all()]);

        try {
            foreach ($request->all() as $index => $item) {

                $image = $item['Logo_Shope'] != null ? uploadbase64images('logos', $item['Logo_Shope']) : null;
                $uu =   setting::find(1)->first();
                deleteimage('logos',$uu->logo_shop);
                $uu->update( [
                    'name_shop'         => $item['Name_Shope'] ,
                    'maneger_phone'     => $item['Manegaer_Fhone'] ,
                    'phone_shop'        => $item['Shope_Fhone'] ,
                    'address_shop'      => $item['Shope_Adresse'] ,
                    'logo_shop'         => $image  ,
                    'message_report'    => $item['Messge_Report'] ,
                    'delivery_amount'   => $item['Delivery_Amount'] ,
                    'delivery_message'  => $item['Delivery_Messge']  ,
                    'salesstatus'       => $item['SalesStatus'] ,
                    'point_system'      => $item['PointSystem']  ,
                    'point_le'          => $item['PointPerLE']  ,
                    'region_id'         => $item['Region'] ,
                    'country_id'        => $item['Country'] ,
                    'supcategory_id'    => $item['SUPCategoryAPPID'] ,
                    'type_of_goods'     => $item['Type_of_goods'] ,
                    'delivery_though'   => $item['delivery_through'] ,
                    'minimum_products'  => $item['Minimum_products'] ,
                    'minimum_financial' => $item['Financial_minimum'] ,
                    'deferred_sale'     => $item['deferred_sale'] ,
                    'low_profit'        => $item['low_profit'] ,
                    'Store_id'          => $item['Store_id'] ,
                    'point_price'       => $item['PointPrice'] ,
                    'BackupDB'          => $item['BackupDB'] ,
                    'city_id'           => $item['City'] ,
                    'Shop_Manegaer'     => $item['Shop_Manegaer'] ,
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
    function delete_selseheader($id)
    {
        Log::info('delete_selseheader', ['0'=>$id]);

        try {
            SalesHeader::where('id',$id)->delete();
            SalesDetails::where('sale_header_id',$id)->delete();
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
        Log::info('delete_selseheader', ['0'=>$id]);

        try {
            DeliveryHeader::where('id',$id)->delete();
            DeliveryDetails::where('sale_header_id',$id)->delete();
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
        Log::info('uploadStock', ['0'=>$request->all()]);

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
        Log::info('upload_stock', ['0'=>$request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Stock::updateOrCreate(['id' => $item['Stock_ID']], [
                    'id'          => $item['Stock_ID'],
                    'store_id'    => $item['Store_id'],
                    'product_id'  => $item['Product_Id'],
                    'quantity'    => $item['Quantity'],
                    'expiredate'  => $item['ExpireDate'],
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
    function upload_Attendance(Request $request)
    {
        Log::info('upload_stock', ['0'=>$request->all()]);

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
        Log::info('upload_banks', ['0'=>$request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Stock::updateOrCreate(['id' => $item['banks_id']], [
                    'id'          => $item['banks_id'],
                    'banks_name'    => $item['banks_name'],
                    'banksNamper'  => $item['banksNamper'],
                    'name_branch'    => $item['name_branch'],
                    'discount'    => $item['discount'],
                    'banks_note'    => $item['banks_note'],
                    'balanceNow'    => $item['balanceNow'],
                    'banks_Acteve'  => $item['banks_Acteve'],
                    'user_id'  => $item['user_id'],
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
        Log::info('upload_Damage', ['0'=>$request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Stock::updateOrCreate(['id' => $item['DamageId']], [
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
        Log::info('upload_erolment_emps', ['0'=>$request->all()]);

        try {
            foreach ($request->all() as $index => $item) {
                $uu = Stock::updateOrCreate(['id' => $item['eroment_id']], [
                    'id'          => $item['eroment_id'],
                    'jop_id'    => $item['jop_id'],
                    'emp_name'  => $item['emp_name'],
                    'emp_fhone'    => $item['emp_fhone'],
                    'emp_note'  => $item['emp_note'],
                    'user_id'  => $item['user_id'],
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

