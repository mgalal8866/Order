<?php

namespace App\Repository;


use App\Models\ProductDetails;
use App\Http\Resources\ProductCollectionResource;
use App\Models\ProductHeader;
use App\Repositoryinterface\ProductRepositoryinterface;

class DBProductRepository implements ProductRepositoryinterface
{
    public function getprobycat($id)
    {
        // \DB::enableQueryLog(); // Enable query log
        return Resp(new ProductCollectionResource(ProductDetails::Getcategory($id)->online()->paginate(10)), 'success', 200, true)->getData(true);
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
        $results = ProductDetails::where('productd_barcode', 'LIKE', $search)
            ->orWhereHas('productheader', function ($query) use ($search) {
                $query->where('product_name', 'LIKE', "%" . $search . "%")->online();
            })->online()
            ->paginate(10);
        return Resp(new ProductCollectionResource($results), 'success', 200, true)->getData(true);
    }
}
