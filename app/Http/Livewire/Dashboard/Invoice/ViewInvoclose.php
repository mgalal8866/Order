<?php

namespace App\Http\Livewire\Dashboard\Invoice;

use Livewire\Component;
use App\Models\SalesHeader;
use Livewire\WithPagination;
use Carbon\Carbon;
class ViewInvoclose extends Component
{
    use WithPagination;

    public $pg = 5, $search,$fromdate, $todate;
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
            $invoices = SalesHeader::with('user')->whereBetween('created_at', [$this->fromdate, $this->todate])->Status(0)->paginate( $this->pg );
        } else {

            $invoices = SalesHeader::WhereHas('user', function ($query) {
                return  $query->where('client_name', 'LIKE', "%" . $this->search  . "%")->orwhere('client_fhonewhats', 'LIKE', "%" . $this->search  . "%");
            })->whereBetween('created_at', [$this->fromdate, $this->todate])->with('user', function ($query) {
                return  $query->where('client_name', 'LIKE', "%" . $this->search  . "%")->orwhere('client_fhonewhats', 'LIKE', "%" . $this->search  . "%");
            })->Status(0)->paginate( $this->pg );
        }


        return view('livewire.dashboard.invoice.view-invoclose', ['invoices' => $invoices]);
    }
}
