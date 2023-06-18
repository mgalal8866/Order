<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Repositoryinterface\CategoryRepositoryinterface;


class CategoryController extends Controller
{
    private $categoryRepositry;
    public function __construct(CategoryRepositoryinterface $categoryRepositry)
    {
        $this->categoryRepositry = $categoryRepositry;
    }

   public function getcategory()  {
   
    return $this->categoryRepositry->getcategory();
    }

}
