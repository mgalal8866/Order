<?php

namespace App\Models;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductHeader extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsto(Category::class,'product_category');
    }
    public function stock()
    {
        return $this->hasMany(Stock::class,'product_id');
    }
    public function productdetails()
    {
        return $this->hasMany(ProductDetails::class,'product_header_id');
    }
    public function scopeOnline($query)
    {
        return $query->where('product_online', 1);
    }


}
