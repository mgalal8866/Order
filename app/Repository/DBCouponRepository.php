<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\DeliveryHeader;
use App\Models\SalesHeader;
use App\Repositoryinterface\CouponRepositoryinterface;
use Illuminate\Support\Facades\Auth;

class DBCouponRepository implements CouponRepositoryinterface
{
    public function checkcoupon($code)
    {
        $coupon = Coupon::where('code', $code)->DateValid()->first();

        if ($coupon != null)
            if ($coupon->used > 0) {
                $deliveryheader = DeliveryHeader::select('client_id', 'coupon_id')->where('client_id', Auth::user('api')->id)->where('coupon_id', $coupon->id)->count();
                $saleheader = SalesHeader::select('client_id', 'coupon_id')->where('client_id', Auth::user('api')->id)->where('coupon_id', $coupon->id)->count();
                return $coupon->where('code', $code)->DateValid()->Where('used', '>', ($saleheader + $deliveryheader))->first();
            }else{

                return $coupon;
            }
        return false;
    }
    public function getall()
    {
        return  Coupon::DateValid()->Checkused()->get();
    }
}
