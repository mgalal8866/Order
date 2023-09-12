<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesHeader extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function salesdetails()
    {
        return $this->hasMany(SalesDetails::class, 'sale_header_id');
    }
    public function coupon()
    {
        return $this->belongsto(Coupon::class, 'coupon_id');
    }
    public function user()
    {
        return $this->belongsto(User::class, 'source_id');
    }
    public function comment()
    {
        return $this->belongsto(comment::class, 'comment_id');
    }
    public function scopeStatus($query, $v)
    {
        return $query->where('satus_delivery', $v);
    }
    public function scopeDelivered($query)
    {
        return $query->where('type_order', '!=','تم التوصيل')->where('status','=','دليفرى');
    }
    public function scopeCountreturned($query)
    {
               return $query->where('invoicetype', 1)->count();
    }
    public function scopeCountpurchase($query)
    {
               return $query->where('invoicetype', 0)->count();
    }
    public function scopeSumreturned($query)
    {
               return $query->where('invoicetype', 1)->sum('grandtotal');
    }
    public function scopeSumpurchase($query)
    {
        return $query->where('invoicetype', 0)->sum('grandtotal');
    }
}
