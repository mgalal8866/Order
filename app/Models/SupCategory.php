<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function _parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function category()
    {
        return $this->hasMany(ProductHeader::class,'product_sup_id');
    }
    public function getImageAttribute($val)
    {
        $path = public_path('assets/images/category/' . $val);
        if (File::exists($path)) {
            return ($val !== null) ? asset('assets/images/category/' . $val) : asset('assets/images/noimage.jpg');
        } else {
            return asset('asset/images/noimage.jpg');
        }
    }
}
