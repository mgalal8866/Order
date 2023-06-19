<?php

namespace App\Repository;


use App\Models\ProductDetails;
use App\Http\Resources\ProductCollectionResource;
use App\Repositoryinterface\ProductRepositoryinterface;

class DBProductRepository implements ProductRepositoryinterface
{
    public function getprobycat($id)
    {
        // \DB::enableQueryLog(); // Enable query log
        // $dd = ProductDetails::select('id')->WhereHas('productheader',function($q)use ($id){
        //     if($id != null) $q->where('product_category',$id);
        //    })->with('productheader')->with('unit')->with('stock')->with('wishlist')->paginate(10);
        // \DB::enableQueryLog(); // Enable query log

          return Resp(new ProductCollectionResource(ProductDetails::WhereHas('productheader',function($q)use ($id){
            if($id != null) $q->where('product_category',$id);
        })->with('productheader')->with('unit')->with('stock')->with('wishlist')->paginate(10)),'success',200,true)->getData(true);
        // dd(\DB::getQueryLog()); // Show results of log
    }
}
