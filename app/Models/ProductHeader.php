<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Category;
use App\Models\ProductDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductHeader extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsto(Category::class, 'product_category');
    }
    public function stock()
    {
        return $this->hasone(Stock::class, 'product_id');
        // return $this->hasMany(Stock::class,'product_id');
    }
    public function stockmany()
    {
        // return $this->hasone(Stock::class, 'product_id');
        return $this->hasMany(Stock::class, 'product_id');
    }
    public function productdetails()
    {
        return $this->hasMany(ProductDetails::class, 'product_header_id');
    }
    public function scopeOnline($query)
    {
        return $query->where('product_online', 1);
    }

    public function brand()
    {
        return $this->belongsTo(brands::class, 'brand_id');
    }
    public function scopeInstock($query)
    {

        // $productDetails = $query->productdetails;
        // $subquery = ProductDetail::select('product_header_id', 'productd_UnitType')
        // ->whereIn('product_header_id', $query->pluck('id'));

        // foreach ($productDetails as $productDetail) {
        //     if ($productDetail->productd_UnitType == 1) {
        //         return $query->whereHas('productdetails', function ($q) {
        //             $q->where('productd_size', '<', 11);
        //         });
        //     }
        // }

        // Default case, if none of the productdetails matched the condition
        // return $query;
    }
}
