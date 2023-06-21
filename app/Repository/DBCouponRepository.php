<?php

namespace App\Repository;

use App\Models\Coupon;
use App\Repositoryinterface\CouponRepositoryinterface;


class DBCouponRepository implements CouponRepositoryinterface
{
    public function checkcoupon($code)
    {
       return Coupon::where('code',$code)->first();
    }

}
