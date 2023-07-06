<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use App\Models\SalesDetails;
use Livewire\Component;

class ViewInvodetails extends Component
{
    public $sale_header_id;
    public function mount($id){
        $this->sale_header_id = $id;
    }
    public function render()
    {
        $invodetails = SalesDetails::where('sale_header_id',$this->sale_header_id)->with('productdetails')->get();
        // dd($invodetails);
        return view('livewire.dashboard.invoice.view-invodetails',['invodetails'=> $invodetails]);
    }
}
