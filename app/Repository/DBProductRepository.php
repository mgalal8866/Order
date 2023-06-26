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
        return Resp(new ProductCollectionResource(ProductDetails::Getcategory($id)->paginate(10)), 'success', 200, true)->getData(true);
        // dd(\DB::getQueryLog()); // Show results of log


    }
    public function getoffers()
    {
        // \DB::enableQueryLog(); // Enable query log
        return Resp(new ProductCollectionResource(ProductDetails::Getoffers()->paginate(10)), 'success', 200, true)->getData(true);
        // \DB::getQueryLog(); // Show results of log
    }
    public function searchproduct($search)
    {
        
    }
}
