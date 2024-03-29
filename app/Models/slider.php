<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
class slider extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeActive($query, $val)
    {
        return $query->where('active', $val);
    }
    public function getOrginalimageAttribute()
    {
            return $this->getAttributes()['image'];
    }
    public function getImageAttribute($val)
    {
        return getimage($val,'sliders');
        // $path = public_path('asset/images/sliders/' . $val);
        // if (File::exists($path)) {
        //     return ($val !== null) ? asset('asset/images/sliders/' . $val) : asset('asset/images/noimage.jpg');
        // } else {
        //     return asset('asset/images/noimage.jpg');
        // }
    }
}
