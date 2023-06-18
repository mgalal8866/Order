<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\slider;
use App\Repositoryinterface\SliderRepositoryinterface;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliderRepository;
    public function __construct(SliderRepositoryinterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function getslider(){
        return Resp(  $this->sliderRepository->getslider(),'Success',200,true);
    }
}
