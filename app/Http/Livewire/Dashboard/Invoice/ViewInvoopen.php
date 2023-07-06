<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use App\Models\SalesHeader;
use Livewire\Component;

class ViewInvoopen extends Component
{
    public function render()
    {
        $invoices = SalesHeader::Status(1)->get();
        return view('livewire.dashboard.invoice.view-invoopen',['invoices' => $invoices]);
    }
}
