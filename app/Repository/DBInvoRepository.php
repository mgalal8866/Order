<?php

namespace App\Repository;

use App\Models\Cart;
use App\Models\deferred;
use App\Models\SalesDetails;
use App\Models\SalesHeader;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\InvoRepositoryinterface;
use Carbon\Carbon;

class DBInvoRepository implements InvoRepositoryinterface
{
    public function getinvo()
    {
        return  SalesDetails::where('user_id', Auth::user()->id)->with('productdetails')->get();
    }
    public function placeorder($request)
    {

        $head = SalesHeader::create([
            'paytayp'           => $request->paytype,
            'totaldiscount'     => $request->totaldiscount,
            'discount_product'  => $request->discount_product,
            'subtotal'          => $request->subtotal,
            'deliverycost'      => $request->deliverycost,
            'grandtotal'        => $request->grandtotal,
            'note'              => $request->note
        ]);

        if ($head) {
            foreach ($request->invo as $in) {
                $head->salesdetails()->create([
                    'product_id'    => $in['product_id'],
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
}
