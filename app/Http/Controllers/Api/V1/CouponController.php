<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use App\Repositoryinterface\CouponRepositoryinterface;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private $couponRepositry;
    public function __construct(CouponRepositoryinterface $couponRepositry)
    {
        $this->couponRepositry = $couponRepositry;
    }

    public function checkcoupon($code)
    {

        $c =  $this->couponRepositry->checkcoupon($code);
        if ($c) {
            return Resp(new CouponResource($c),'Valid' ,200,true);
        }else{
            return Resp('','Not Valid' ,200,false);
        }
    }
    public function getall()
    {

        return Resp( $this->couponRepositry->getall(),'success' ,200,true);;

    }
}
