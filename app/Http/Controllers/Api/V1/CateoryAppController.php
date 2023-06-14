<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoyAppResource;
use App\Repositoryinterface\CateoryAppRepositoryinterface;

class CateoryAppController extends Controller
{
    private $categoryapp;
    public function __construct(CateoryAppRepositoryinterface $categoryapp)
    {
        $this->categoryapp = $categoryapp;
    }
    function getcategoryapp()
    {   $data = $this->categoryapp->getcategoryapp();
        return  CategoyAppResource::collection($data) ;
    }
}
