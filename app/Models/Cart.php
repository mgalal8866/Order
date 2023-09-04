<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productdetails()
    {
        return $this->belongsto(ProductDetails::class, 'product_id');
    }
    public function client()
    {
        return $this->belongsto(user::class, 'user_id');
    }

    public function scopeGetroductid($query,$id)
    {
        return $query->where('product_id',$id)->where('user_id',Auth::guard('client')->user()->id);
    }

}
