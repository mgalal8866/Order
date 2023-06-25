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
    public function scopeStatus($query, $v)
    {
        return $query->where('satus_delivery', $v);
    }
}
