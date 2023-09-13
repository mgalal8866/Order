<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Repositoryinterface\ProductRepositoryinterface;
use Illuminate\Http\Request;

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
      return  $this->productRepositry->searchproduct($search);
    }
 }
