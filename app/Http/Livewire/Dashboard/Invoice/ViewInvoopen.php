<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DeliveryHeader;
use Carbon\Carbon;


class ViewInvoopen extends Component
{
    use WithPagination;

    public $pg = 5, $search, $fromdate, $todate;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->fromdate     = Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       = Carbon::now()->endOfMonth()->format('Y/m/d');
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if ($this->search == '') {
            $invoices = DeliveryHeader::with('user')->whereBetween('created_at', [$this->fromdate, $this->todate])->Status(1)->paginate($this->pg);
        } else {

            $invoices = DeliveryHeader::WhereHas('user', function ($query) {
                return  $query->where('client_name', 'LIKE', "%" . $this->search  . "%")->orwhere('client_fhonewhats', 'LIKE', "%" . $this->search  . "%");
            })->whereBetween('created_at', [$this->fromdate, $this->todate])->with('user', function ($query) {
                return  $query->where('client_name', 'LIKE', "%" . $this->search  . "%")->orwhere('client_fhonewhats', 'LIKE', "%" . $this->search  . "%");
            })->Status(1)->paginate($this->pg);
        }
        return view('livewire.dashboard.invoice.view-invoopen', ['invoices' => $invoices]);
    }
}
