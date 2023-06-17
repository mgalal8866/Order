<?php

namespace App\Repository;

use App\Models\ProductHeader;
use App\Repositoryinterface\ProductRepositoryinterface;

class DBProductRepository implements ProductRepositoryinterface
{
    public function getprobycat($id)
    {
     return ProductHeader::all();
    }
}
