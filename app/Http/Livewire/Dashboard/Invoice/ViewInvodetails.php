<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use App\Models\SalesDetails;
use App\Models\SalesHeader;
use App\Models\setting;
use Livewire\Component;

class ViewInvodetails extends Component
{
    public $sale_header_id;
    public function mount($id){
        $this->sale_header_id = $id;
    }
    public function render()
    {
        $invo = SalesHeader::whereId($this->sale_header_id)->with('salesdetails',function($q){
            return  $q->with('productdetails',function($qq){
                  return  $qq->with('productheader');
            });
          })->first();
          $setting = setting::first();
        return view('livewire.dashboard.invoice.view-invodetails',['invo'=> $invo,'setting'=>$setting]);
    }
}
