<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;


class ProductCollectionResource extends ResourceCollection
{

    public function toArray($request)
    {

        $uniqueBrands = $this->collection
            ->pluck('productheader.brand')
            ->filter(function ($brand) {
                return !is_null($brand);
            })
            ->unique();

            $product = $this->collection->filter(function ($p) {
               if( $p->Qtystockapi($p->productheader->stockmany->sum('quantity')) == 'متوفر'){
                return $p;
                }
            });

        return [
            'brands'  =>   BrandResource::collection($uniqueBrands),
            'product' => ProductDetailsResource::collection($product),
            'pagination' => [
                'total'        => $this->total(),
                'count'        => $this->count(),
                'per_page'     => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages'  => $this->lastPage(),
                'path'         => $this->path(),
                'current_path' => $this->path() . '?page=' . $this->currentPage(),
            ],

        ];
    }
}
