<?php

namespace App\Repository;


use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\WishlistRepositoryinterface;

class DBWishlistRepository implements WishlistRepositoryinterface
{
    public function getwishlist()
    {
        return  Wishlist::where('user_id', Auth::user()->id)->with('productdetails')->get();
    }
    public function addwishlist($id)
    {
        $w =   Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if($w){
            return $this->getwishlist();
        }
          $w = Wishlist::create(['user_id'=> Auth::user()->id,'product_id'=> $id]);
        if($w)
        return   $this->getwishlist();

    }
    public function delete($id)
    {
        $w =   Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($w->delete()) {
            return   $this->getwishlist();
        };
    }
}
