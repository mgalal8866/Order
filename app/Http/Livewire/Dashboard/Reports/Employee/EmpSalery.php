<?php

namespace App\Http\Livewire\Dashboard\Reports\Employee;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;

class EmpSalery extends Component
{
    public $username = '',$employees, $fromdate, $todate, $exportdata = [], $selected = null;
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }
    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->employees    =  Employee::get();
    }
    public function render()
    {
        return view('livewire.dashboard.reports.employee.emp-salery');
    }
}
