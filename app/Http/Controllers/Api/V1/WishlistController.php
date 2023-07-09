<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Repositoryinterface\WishlistRepositoryinterface;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    private $wishlistRepositry;
    public function __construct(WishlistRepositoryinterface $wishlistRepositry)
    {
        $this->wishlistRepositry = $wishlistRepositry;
    }
    public function addwishlist($id){
        Log::info('ADD wishlist',['Product_id'=>$id]);
        return Resp(WishlistResource::collection($this->wishlistRepositry->addwishlist($id)), 'success', 200, true);
    }
    public function getwishlist()
    {
        return Resp(WishlistResource::collection($this->wishlistRepositry->getwishlist()), 'success', 200, true);
    }
    public function deletewishlist($id)
    {
        Log::info('Delecte wishlist',['Product_id'=>$id]);
        return Resp(WishlistResource::collection($this->wishlistRepositry->delete($id)), 'success', 200, true);
    }
}
