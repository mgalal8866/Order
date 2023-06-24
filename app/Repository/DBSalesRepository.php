<?php

namespace App\Repository;

use App\Models\SalesDetails;
use App\Models\SalesHeader;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\SalesRepositoryinterface;
use GuzzleHttp\Promise\Create;

class DBSalesRepository implements SalesRepositoryinterface
{
    public function add_seles($requset)
    {
        $header = SalesHeader::Create([
                'paytayp'       => $requset->paytype,
                'totaldiscount' => $requset->totaldiscount,
                'discount_g'    => $requset->totaldiscount,
                'discount_g'    => $requset->totaldiscount,

        ]);

        foreach($requset as $item){
            $items = SalesDetails::Create([
                // 'sale_header_id'
                // 'product_id'
                // 'buyprice'
                // 'sellprice',
                // 'quantity',
                // 'subtotal',
                // 'discount',
            ]);
        }

    }
    public function delete($id)
    {
        $w =   Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($w->delete()) {
            return  Wishlist::where('user_id', Auth::user()->id)->get();
        };
    }
}
