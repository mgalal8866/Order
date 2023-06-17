<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHeader extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsto(SupCategory::class);
    }
    public function productdetails()
    {
        return $this->hasMany(productdetails::class,'product_id');
    }

}
