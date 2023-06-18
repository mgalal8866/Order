<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts =
    [
        'productd_Sele1' => 'float',
        'productd_Sele2' => 'float',
    ];
    public function unit()
    {
        return $this->belongsto(unit::class, 'productd_unit_id');
    }
    public function productheader()
    {
        return $this->belongsto(ProductHeader::class, 'product_id');
    }
    public function getProductdImageAttribute($val)
    {
        $path = public_path('asset/images/products/' . $val);
        if (File::exists($path)) {
            return ($val !== null) ? asset('asset/images/products/' . $val) : asset('asset/images/noimage.jpg');
        } else {
            return asset('asset/images/noimage.jpg');
        }
    }
    public function getIsofferAttribute($val)
    {
        if (($val == 1) && (Carbon::now()->diffInDays($this->getAttributes()['EndOferDate'], false) > 0)) {
            return true;
        } else {
            return false;
        };
    }
    public function getEndOferDateAttribute($val)
    {
        if ($val != null) {

            if ($this->getAttributes()['isoffer'] == 1) {
                return   "ينتهى بعد "  . Carbon::now()->diffInDays($val, false) . " أيام";
            }
        };
    }

    public function scopeUnits($query, $product_id)
    {
        return $query->where('product_id', $product_id)->select('productd_unit_id', 'productd_size')->with('unit');
    }
}
