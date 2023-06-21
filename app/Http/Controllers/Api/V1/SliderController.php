<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Repositoryinterface\SliderRepositoryinterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    private $sliderRepository;
    public function __construct(SliderRepositoryinterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function getslider()
    {
        return Resp(SliderResource::collection($this->sliderRepository->getslider()), 'Success', 200, true);
    }
    public function addslider(Request $request)
    {
        Log::error($request->all());
        // return Resp(new SliderResource($this->sliderRepository->add_slider($request)), 'Success', 200, true);
    }
}
