<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Repositoryinterface\CouponRepositoryinterface;


class DBCouponRepository implements CouponRepositoryinterface
{
    public function checkcoupon($code)
    {
        $coupon = Coupon::DateValid()->where('code', $code);
        return $coupon->Checkused()->first();
    }
    public function getall()
    {
        // $coupon  =
        return  Coupon::DateValid()->Checkused()->get();

    }
}
