<?php

namespace App\Http\Livewire\Dashboard\Reports\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierReport extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pg = 30, $search = null;
    public  $exportdata ;

    public function render()
    {
        $suppliers = Supplier::when($this->search, function ($q) {
            if ($this->search != null) {
                return    $this->exportdata = $q->where('Supplier_name', 'like', '%' . $this->search . '%')->Orwhere('Supplier_fhone', 'like', '%' . $this->search . '%');
            }
        })->latest()->paginate($this->pg);

        $this->exportdata =  $suppliers->map(function ($data) {
           return  [
               'كود المورد' =>$data->Supplier_code,
               'اسم المورد'=>$data->Supplier_name,
               'تليفون'=>$data->Supplier_fhone,
               'رصيد'=>$data->Supplier_Balance,
               'العنوان'=>$data->Supplier_state,
               'اخر تحديث'=>  $data->updated_at->format('d M Y') ];
       });
       $this->emit('export_button', $this->exportdata );
        return view('livewire.dashboard.reports.supplier.supplier-report',['suppliers'=>$suppliers]);
    }
}
