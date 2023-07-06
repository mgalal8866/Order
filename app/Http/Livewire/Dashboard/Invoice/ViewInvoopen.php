<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use App\Models\DeliveryHeader;
use Livewire\Component;

class ViewInvoopen extends Component
{
    public function render()
    {
        $invoices = DeliveryHeader::Status(1)->get();
        return view('livewire.dashboard.invoice.view-invoopen',['invoices' => $invoices]);
    }
}
