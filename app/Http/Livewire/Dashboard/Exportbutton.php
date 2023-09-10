<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Excel as  MPDF;
class Exportbutton extends Component
{

    protected $listeners = ['export_button' => 'change'];
    public $exportdata =[] ,$data,$header,$routeprint;
    public function mount($data,$header,$routeprint=null)
    {

        $this->routeprint = $routeprint;
        $this->exportdata = $data ;
        $this->header = $header ;
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

        return Excel::download(new DataExport($this->exportdata ,  $this->header ), 'users.xlsx');
    }
    public function exportpdf()
    {

        return Excel::download(new DataExport($this->exportdata ,  $this->header ), 'invoices.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
    public function render()
    {

        return view('livewire.dashboard.exportbutton');
    }
}
