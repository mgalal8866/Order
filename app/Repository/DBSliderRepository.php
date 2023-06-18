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
}
