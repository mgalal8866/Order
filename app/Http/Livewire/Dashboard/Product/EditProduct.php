<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Category;
use App\Models\ProductDetails;
use App\Models\ProductHeader;
use App\Models\unit;
use Livewire\Component;

class EditProduct extends Component
{
    public $detailslist = [],$idheader, $categorys, $selectcategory, $units, $name, $limit, $online = 1, $state = 1, $scales = 1, $barcode, $qtyalert, $subunit, $mainunit, $description, $price, $perunit;
    public function mount($id)
    {
        $this->idheader = $id;
        $this->units = unit::get();
        $this->categorys = Category::get();
        $product = ProductHeader::with('productdetails')->find($id);
        $this->selectcategory = $product->product_category??'';
        $this->name           = $product->product_name??'';
        $this->scales         = $product->product_isscale??'';
        $this->online         = $product->product_online??'';
        $this->limit          = $product->product_limit??'';
        $this->state          = $product->product_acteve??'';
        // $this->limit          = $product->product_note;
        $list = $product->productdetails ?? [] ;
        foreach (  $list  as  $item) {
            $this->detailslist [] = [
            'id'         => $item->id,
            'image'      => $item->productd_image,
            'unit'       => $item->productd_unit_id ?? '',
            'unitqty'    => $item->productd_size ?? '',
            'code'       => $item->productd_barcode,
            'price_pay'  => $item->productd_bay,
            'price_salse'=> $item->productd_Sele1,
            'offer'      => $item->productd_Sele2,
            'dateexp'    => $item->EndOferDate,
            'limitmax'   => $item->maxqty,
            'online'     => $item->productd_online,
            'addtosales' => $item->productd_fast_Sele,
            ];
        }

        // $this->detailslist= [[
        //     'image'=>'',
        //     'unit'=>'',
        //     'unitqty'=>'',
        //     'code'=>'',
        //     'price_pay'=>'',
        //     'price_salse'=>'',
        //     'offer'=>'',
        //     'dateexp'=>'',
        //     'limitmax'=>'',
        //     'online'=>1,
        //     'addtosales'=>1,
        // ]];
        // $this->reset(['name','barcode','qtyalert','subunit','mainunit','description','price','perunit']);
    }
    public function updatedDetailslist($value, $nested)
    {
        // $nestedData = explode(".", $nested);
        // dd( $nestedData  );
    }
    public function saveproduct()
    {
        $product = ProductHeader::find($this->idheader);
        $product->update([
         'product_category'     => $this->selectcategory,
         'product_name'         => $this->name,
         'product_isscale'      => $this->scales,
         'product_online'       => $this->online,
         'product_limit'        => $this->limit,
         'product_acteve'       => $this->state
        ]);

        foreach ($this->detailslist as $index => $item) {
            ProductDetails::where('id',  $item['id'])->update([
            'productd_image'        => $item['image'],
            'productd_unit_id'      => $item['unit']   ,
            'productd_size'         => $item['unitqty']  ,
            'productd_barcode'      => $item['code'],
            'productd_bay'          => $item['price_pay'],
            'productd_Sele1'        => $item['price_salse'],
            'productd_Sele2'        => $item['offer'],
            'EndOferDate'           => $item['dateexp'],
            'maxqty'                => $item['limitmax'],
            'productd_online'       => $item['online'],
            'productd_fast_Sele'    => $item['addtosales'],
        ]);
        }
    }
    public function render()
    {
        return view('livewire.dashboard.product.edit-product');
    }
}
