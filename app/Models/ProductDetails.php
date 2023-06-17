<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function unit()
    {
        return $this->belongsto(unit::class,'productd_unit_id');
    }

    public function productheader()
    {
        return $this->belongsto(ProductHeader::class,'product_id');
    }


    public function scopeUnits($query,$product_id)
    {
        return $query->where('product_id',$product_id)->select('productd_unit_id','productd_size')->with('unit');
        // return $query->where('productd_UnitType',$type)->where('product_id',$product_id)->with('unit');
    }


}
