<?php

namespace App\Repository;

use App\Models\slider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Repositoryinterface\SliderRepositoryinterface;


class DBSliderRepository implements SliderRepositoryinterface
{
    public function getslider()
    {
        return slider::active(true)->get();
    }
    public function add_slider($request)
    {

        if( $request->image != null){
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/jpg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10).'.'.'jpg';
            File::put(public_path(). '/asset/images/sliders/' . $imageName, base64_decode($image));
            // $request->image = uploadimages('sliders', base64_decode($image));
        }
       $s = slider::create([
            'name'  => $request->name,
            'image' => $request->image,
            'active'=> $request->active
        ]);

        if($s){
            return $s;
        }else{
            return ['Error'=> 'Cant Save'];
        }

    }
}
