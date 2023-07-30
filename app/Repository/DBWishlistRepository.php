<?php

namespace App\Repository;


use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\WishlistRepositoryinterface;
use Illuminate\Support\Facades\Log;

class DBWishlistRepository implements WishlistRepositoryinterface
{
    public function getwishlist()
    {
        return  Wishlist::where('user_id', Auth::user('api')->id)->with('productdetails')->get();
    }
    public function addwishlist($id)
    {
        dd(Auth::guard('api')->user()->id);
        $w =   Wishlist::where('product_id', $id)->where('user_id', Auth::guard('api')->user()->id)->first();
        if($w){
            return $this->getwishlist();
        }
          $w = Wishlist::create(['user_id'=> Auth::guard('api')->user()->id,'product_id'=> $id]);
        if($w)
        return   $this->getwishlist();

    }
    public function delete($id)
    {
        $w =   Wishlist::where('product_id', $id)->where('user_id', Auth::user('api')->id)->first();
        if($w){
          $w->delete();
        }
        return   $this->getwishlist();
    }
}
