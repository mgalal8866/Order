<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Repositoryinterface\CartRepositoryinterface;

class CartController extends Controller
{
    private $cartRepositry;
    public function __construct(CartRepositoryinterface $cartRepositry)
    {
        $this->cartRepositry = $cartRepositry;
    }

    public function getcart()
    {
        return Resp(CartResource::collection($this->cartRepositry->getcart()), 'success', 200, true);
    }
    public function deletefromcart($cart_id)
    {
        return Resp(CartResource::collection($this->cartRepositry->deletecart($cart_id)), 'success', 200, true);
    }
    public function addtocart($product_id, $qty)
    {
        return Resp(CartResource::collection($this->cartRepositry->addtocart($product_id, $qty)), 'success', 200, true);
    }
    public function applydeferred()
    {

        if($this->cartRepositry->applydeferred() != '1')
        {
            return Resp('',$this->cartRepositry->applydeferred(),200,true);
        }else{
            return Resp(true,'الاجل مفعل',200,true);
        }
    }
}
