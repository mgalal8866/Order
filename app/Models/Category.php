<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }
    public function scopeParentonly($query)
    {
        return $query->where('parent_id','!=' , null);
    }
    public function productheader()
    {
        return $this->belongsto(ProductHeader::class, 'product_category');
    }
    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function _parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function getOrginalimageAttribute($val)
    {
            return $this->getAttributes()['image'];
    }
     public function ScopeActive($query,$val)
    {
            return $query->where('category_active',$val);
    }
    public function getImageAttribute($val)
    {
        return getimage($val,'category');

    }

}
