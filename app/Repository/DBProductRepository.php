<?php

namespace App\Repository;


use App\Models\ProductHeader;
use App\Models\ProductDetails;
use App\Http\Resources\ProductDetailsResource;
use App\Http\Resources\ProductCollectionResource;
use App\Repositoryinterface\ProductRepositoryinterface;

class DBProductRepository implements ProductRepositoryinterface
{
    public $pg=10;
    public function getprobycat($id)
    {
        // \DB::enableQueryLog(); // Enable query log
        return Resp(new ProductCollectionResource(ProductDetails::Getcategory($id)->online()->paginate($this->pg)), 'success', 200, true)->getData(true);
        // dd(\DB::getQueryLog()); // Show results of log
    }
    public function getoffers()
    {
        // \DB::enableQueryLog(); // Enable query log
        return Resp( ProductDetailsResource::collection(ProductDetails::Getoffers()->get()), 'success', 200, true)->getData(true);
        // \DB::getQueryLog(); // Show results of log
    }
    public function searchproduct($search)
    {
        $results = ProductDetails::where('productd_barcode', 'LIKE', $search)
            ->orWhereHas('productheader', function ($query) use ($search) {
                $query->where('product_name', 'LIKE', "%" . $search . "%")->online();
            })->online()
            ->paginate($this->pg);
        return Resp(new ProductCollectionResource($results), 'success', 200, true)->getData(true);
    }
}
