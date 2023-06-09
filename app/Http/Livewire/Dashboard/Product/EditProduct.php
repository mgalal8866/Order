<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Category;
use App\Models\ProductDetails;
use App\Models\ProductHeader;
use App\Models\unit;
use Livewire\Component;
use Livewire\FileUploadConfiguration;
use Livewire\WithFileUploads;
class EditProduct extends Component
{
    use WithFileUploads;
    public $detailslist = [],$idheader,$statescales,$categorys, $selectcategory, $units, $name, $limit, $online, $state, $scales;
    public function mount($id)
    {
        $this->idheader = $id;
        $this->units = unit::get();
        $this->categorys = Category::get();
        $product = ProductHeader::with('productdetails')->find($id);
        $this->selectcategory = $product->product_category??'';
        $this->name           = $product->product_name??'';
        $this->scales         = $product->product_isscale==1?true:false;
        $this->statescales    = $product->product_isscale==1?true:false;
        $this->online         = $product->product_online==1?true:false;
        $this->limit          = $product->product_limit;
        $this->state          = $product->product_acteve==1?true:false;
        // $this->limit          = $product->product_note;
        $list = $product->productdetails ?? [] ;
        foreach (  $list  as  $item) {
            $this->detailslist [] = [
            'id'         => $item->id,
            'imagenew'   => null,
            'orginalimage'=> $item->orginalimage,
            'image'      => $item->productd_image,
            'unit'       => $item->productd_unit_id ?? '',
            'unitqty'    => $item->productd_size ?? '',
            'code'       => $item->productd_barcode,
            'price_pay'  => $item->productd_bay,
            'price_salse'=> $item->productd_Sele1,
            'offer'      => $item->productd_Sele2,
            'dateexp'    => $item->EndOferDate,
            'limitmax'   => $item->maxqty,
            'online'     => $item->productd_online==1?true:false,
            'addtosales' => $item->productd_fast_Sele==1?true:false,
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
         'product_online'       => $this->online == true?1:0,
         'product_limit'        => $this->limit == true?1:0,
         'product_acteve'       => $this->state == true?1:0
        ]);

        foreach ($this->detailslist as $index => $item) {

            ProductDetails::where('id',  $item['id'])->update([
            'productd_image'        => $item['imagenew'] != null? uploadimages('product',$item['imagenew']):$item['orginalimage'],
            'productd_unit_id'      => $item['unit']   ,
            'productd_size'         => $item['unitqty']  ,
            'productd_barcode'      => $item['code'],
            'productd_bay'          => $item['price_pay'],
            'productd_Sele1'        => $item['price_salse'],
            'productd_Sele2'        => $item['offer'],
            'EndOferDate'           => $item['dateexp'],
            'maxqty'                => $item['limitmax'],
            'productd_online'       => $item['online'] == true?1:0,
            'productd_fast_Sele'    => $item['addtosales'] == true?1:0,
        ]);
        }
        $this->dispatchBrowserEvent('swal',['message'=>'تم التعديل بنجاح' ]);
        return redirect()->to('admin/dashborad/products');


    }
    public function render()
    {
        return view('livewire.dashboard.product.edit-product');
    }
}
