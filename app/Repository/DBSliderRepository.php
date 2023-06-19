<?php

namespace App\Repository;

use App\Models\slider;
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
            $request->image = uploadimages('sliders', $request->image);

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
