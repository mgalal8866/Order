<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;


class ProductCollectionResource extends ResourceCollection
{

    public function toArray($request)
    {
         // $uniqueBrands = $this->collection
        //     ->filter(function ($item) {
        //         // Use the filter to exclude null values
        //         return !is_null(data_get($item, 'productheader.brand'));
        //     })->pluck('productheader.brand')->unique();
        $uniqueBrands = $this->collection
    ->pluck('productheader.brand')
    ->filter()
    ->unique();
            // $uniqueBrands = $this->collection->pluck('productheader.brand')->unique();

        return [
            'brands'  =>   BrandResource::collection($uniqueBrands ),
            'product' => ProductDetailsResource::collection($this->collection),
            'pagination' => [
                'total'        => $this->total(),
                'count'        => $this->count(),
                'per_page'     => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages'  => $this->lastPage(),
                'path'         => $this->path(),
                'current_path' => $this->path().'?page='.$this->currentPage(),
            ],

        ];
    }
}
