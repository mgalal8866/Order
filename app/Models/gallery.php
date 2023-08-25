<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
class gallery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeActive($query, $val)
    {
        return $query->where('active', $val);
    }
    public function getOrginalimageAttribute()
    {
            return $this->getAttributes()['img'];
    }
    public function getImageAttribute($val)
    {
        $path = public_path('asset/images/gallery/' . $val);
        if (File::exists($path)) {
            return ($val !== null) ? asset('asset/images/gallery/' . $val) : asset('asset/images/noimage.jpg');
        } else {
            return asset('asset/images/noimage.jpg');
        }
    }
}
