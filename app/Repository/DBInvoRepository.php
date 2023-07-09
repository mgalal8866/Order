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
     Log::error($request['data']['paytype']);
        $head = DeliveryHeader::create([
            'paytayp'           => $request['data']['paytype'],
            'total_profit'      => $request->total_profit??0,
            'coupon_id'         => $request->coupon_id??null,
            'discount_product'  => $request->discount_product??0,
            'subtotal'          => $request->subtotal??0,
            'client_id'         => Auth::user('api')->id,
            'grandtotal'        => $request->grandtotal??0,
            'totaldiscount'     => $request->totaldiscount??0,
            'note'              => $request->note
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
