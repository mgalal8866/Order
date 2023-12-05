<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getLogoShopAttribute($val)
    {
        return getimage($val, 'logos');

        // $path = public_path('asset/images/logos/' . $val);
        // if (File::exists($path)) {
        //     return ($val !== null) ? asset('asset/images/logos/' . $val) : asset('asset/images/noimage.jpg');
        // } else {
        //     return asset('asset/images/noimage.jpg');
        // }
    }
    public function getPhotoMainAttribute($val)
    {
        if ($val == null) return null;
        return getimage($val, 'logos');

        // $path = public_path('asset/images/logos/' . $val);
        // if (File::exists($path)) {
        //     return ($val !== null) ? asset('asset/images/logos/' . $val) : asset('asset/images/noimage.jpg');
        // } else {
        //     return asset('asset/images/noimage.jpg');
        // }
    }
}
