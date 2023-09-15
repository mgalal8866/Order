<?php

namespace App\Http\Livewire\Dashboard\Reports\Employee;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Statements;

class EmpAdvance extends Component
{
    public $username = '', $statements = [],  $employees, $fromdate, $todate, $exportdata = [], $selected = null;
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
        $this->statements = Statements::where(function ($q) {
            if (!empty($this->selected)) {
                $q->where('Emp_id',  $this->selected);
            }
        })->whereBetween('created_at', [$this->fromdate, $this->todate])->get();
        $this->username =  count($this->statements) == 1 ? $this->statements[0]->employee->name : '';
        $this->exportdata      = $this->statements->map(function ($data) {
            return  [
                trans('tran.name_emp')       => $data->employee->name ?? 'N/A',
                trans('tran.type_advance')   => $data->Statements_Type ?? 'N/A',
                trans('tran.details')        => $data->Statements_TypeDetils ?? 'N/A',
                trans('tran.amount')         => $data->Amount ?? 'N/A',
                trans('tran.username')       => $data-> userdesck->user_name ?? 'N/A',
                trans('tran.namesafe')       => $data->safe->safe_name ?? 'N/A',
                trans('tran.date')           => $data->created_at ?? 'N/A',
            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.employee.emp-advance');
    }
}
