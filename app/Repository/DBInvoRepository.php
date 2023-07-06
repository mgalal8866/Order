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

        $head = DeliveryHeader::create([
            'paytayp'           => $request->paytype,
            'totaldiscount'     => $request->totaldiscount,
            'discount_product'  => $request->discount_product,
            'subtotal'          => $request->subtotal,
            'client_id'         => Auth::user('api')->id,
            'deliverycost'      => $request->deliverycost,
            'grandtotal'        => $request->grandtotal,
            'note'              => $request->note
        ]);

        if ($head) {
            foreach ($request->invo as $in) {
                $head->salesdetails()->create([
                    'product_details_id'    => $in['product_id'],
                    'buyprice'      => $in['buyprice'],
                    'sellprice'     => $in['sellprice'],
                    'quantity'      => $in['quantity'],
                    'discount'      => $in['discount'],
                    'grandtotal'    => $in['grandtotal'],
                    'profit'        => $in['profit']
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
