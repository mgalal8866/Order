<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;


class ProductCollectionResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
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
