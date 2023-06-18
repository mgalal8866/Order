<?php

namespace App\Repository;

use App\Http\Resources\ProductCollectionResource;
use App\Http\Resources\ProductDetailsResource;
use App\Models\ProductDetails;
use App\Models\ProductHeader;
use App\Models\unit;
use App\Repositoryinterface\ProductRepositoryinterface;

class DBProductRepository implements ProductRepositoryinterface
{
    public function getprobycat($id)
    {

       return   Resp(new ProductCollectionResource(ProductDetails::WhereHas('productheader',function($q)use ($id){
        if($id != null) $q->where('product_category',$id);
       })->with('productheader')->with('unit')->paginate(10)),'success',200,true)->getData(true);
    }
}
