<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use App\Models\SalesHeader;
use Livewire\Component;

class ViewInvoclose extends Component
{
    public function render()
    {
        $invoices = SalesHeader::with('user')->Status(0)->get();
        return view('livewire.dashboard.invoice.view-invoclose',['invoices' => $invoices]);
    }
}
