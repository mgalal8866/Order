<?php
namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositoryinterface\ProductRepositoryinterface;

class ProductHeaderController extends Controller
{
    private $productRepositry;
    public function __construct(ProductRepositoryinterface $productRepositry)
    {
        $this->productRepositry = $productRepositry;
    }
    public function getproductbycat($id=null)
    {
      return  $this->productRepositry->getprobycat($id);
    }
    public function getoffers()
    {
      return  $this->productRepositry->getoffers();
    }
    // public function searchproduct($search=null)
    public function searchproduct($search=null)
    {
       Log::error($search);
      return  $this->productRepositry->searchproduct($search);
    }
 }
