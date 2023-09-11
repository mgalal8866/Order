<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Excel as  MPDF;
class Exportbutton extends Component
{

    protected $listeners = ['export_button' => 'change'];
    public $exportdata =[] ,$data,$routeprint;
    public function mount($data,$routeprint=null)
    {
        $this->routeprint = $routeprint;
        $this->exportdata = $data ;
    }
    public function change($data)
    {
        $this->exportdata = $data ;
    }
    public function print()
    {
        return redirect($this->routeprint);
    }
    public function exportexcel()
    {

        return Excel::download(new DataExport($this->exportdata), 'users.xlsx');
    }
    public function exportpdf()
    {

        return Excel::download(new DataExport($this->exportdata), 'invoices.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
    public function render()
    {

        return view('livewire.dashboard.exportbutton');
    }
}
