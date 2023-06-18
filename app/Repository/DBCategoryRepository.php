<?php

namespace App\Repository;

use App\Models\Category;
use App\Http\Resources\CategorProductResource;
use App\Repositoryinterface\CategoryRepositoryinterface;

class DBCategoryRepository implements CategoryRepositoryinterface
{
    public function getcategory(){

       return  Resp(CategorProductResource::collection(Category::get()),'success',200,true);
    }

}
