<?php

namespace App\Repository;

use App\Models\Cart;
use App\Models\deferred;
use App\Models\DeliveryDetails;
use App\Models\DeliveryHeader;
use App\Models\SalesDetails;
use App\Models\SalesHeader;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\InvoRepositoryinterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DBInvoRepository implements InvoRepositoryinterface
{
    public function getopeninvo()
    {
        return  DeliveryHeader::status(1)->where('user_id', Auth::user('api')->id)->paginate(10);
        // return  SalesDetails::where('user_id', Auth::user('api')->id)->with('productdetails')->get();
    }
    public function getcloseinvo()
    {
        return  SalesHeader::status(0)->where('user_id', Auth::user('api')->id)->paginate(10);
        // return  SalesDetails::where('user_id', Auth::user('api')->id)->with('productdetails')->get();
    }
    public function placeorder($request)
    {

        Log::info('Place Order',['data'=>$request['data'],'invo'=>$request['invo']]);

        $head = DeliveryHeader::create([
            'paytayp'           => $request['data']['paytype'],
            'total_profit'      => $request['data']['total_profit']??0,
            'invoicedate'      => Carbon::now(),
            'coupon_id'         => $request['data']['coupon_id']??null,
            'discount_product'  => $request['data']['discount_product']??0,
            'subtotal'          => $request['data']['subtotal']??0,
            'client_id'         => Auth::user('api')->id,
            'grandtotal'        => $request['data']['grandtotal']??0,
            'remaining'         => $request['data']['grandtotal']??0,
            'totaldiscount'     => $request['data']['totaldiscount']??0,
            'discount_g'        => $request['data']['discount_g']??0,
            'note'              => $request['data']['note']??'لايوجد ملاحظات'
        ]);
        if ($head) {
            foreach ($request->invo as $in) {
                $head->salesdetails()->create([
                    'product_details_id'    => $in['product_id'],
                    'buyprice'      => $in['buyprice']??0,
                    'sellprice'     => $in['sellprice']??0,
                    'subtotal'      => $in['subtotal']??0,
                    'quantity'      => $in['quantity']??0,
                    'discount'      => $in['discount']??0,
                    'grandtotal'    => $in['grandtotal']??0,
                    'profit'        => $in['profit']??0
                ]);
            }
        }
        Cart::where('user_id', Auth::user('api')->id)->delete();
        return $head->with('salesdetails')->get();
    }
    public function getinvoicedetailsclose($id)
    {
        return SalesDetails::whereSaleHeaderId($id)->with('productdetails')->get();
    }
    public function getinvoicedetailsopen($id)
    {
    
        return DeliveryDetails::whereSaleHeaderId($id)->with('productdetails')->get();
    }
}
