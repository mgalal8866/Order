<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use App\Models\DeliveryDetails;
use App\Models\DeliveryHeader;
use App\Models\setting;
use Livewire\Component;

class ViewInvodetailsopen extends Component
{
    public $sale_header_id;
    public function mount($id){
        $this->sale_header_id = $id;
    }
    public function render()
    {
        $invo = DeliveryHeader::whereId($this->sale_header_id)->with('salesdetails',function($q){
          return  $q->with('productdetails',function($qq){
                return  $qq->with('productheader');
          });
        })->first();
        $setting = setting::first();
    
        // dd($invodetails->salesdetails);
        return view('livewire.dashboard.invoice.view-invodetailsopen',['invo'=> $invo,'setting'=>$setting ]);
    }

}
