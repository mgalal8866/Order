<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\ProductDetails;
use App\Models\products;
use App\Models\produts;
use Livewire\Component;

class CreateProduct extends Component
{
    public $name,$barcode,$qtyalert,$subunit,$mainunit,$description,$price,$perunit;

    public function mount(){
        $this->reset(['name','barcode','qtyalert','subunit','mainunit','description','price','perunit']);

    }

    public function saveproduct()
    {
        ##CREATE product
        // if($this->code == null){
        //     $Gcode      = products::max('code');
        //     $Gcode      = substr($Gcode, 2);
        //     $number     = intval($Gcode);
        //     $number++;
        //     $this->code =  'CO' . str_pad($number, 5, '0', STR_PAD_LEFT);
        // }
        $product = ProductDetails::create(
            [
                'name'        => $this->name,
                'barcode'     => $this->barcode,
                'alert_qty'   => $this->qtyalert??0,
                'sub_unit'    => $this->subunit??'',
                'main_unit'   => $this->mainunit??'',
                'description' => $this->description,
                'per_unit'    => $this->perunit,
                'price'       => $this->price,
            ]);
            $this->dispatchBrowserEvent('closeModal',['message'=> __('tran.sucesscustomrt') ]);
            $this->emit('view-product');
            $this->reset(['name','barcode','qtyalert','subunit','mainunit','description','price','perunit']);


    }
    public function render()
    {
        return view('livewire.Dashboard.product.create-product');
    }
}
