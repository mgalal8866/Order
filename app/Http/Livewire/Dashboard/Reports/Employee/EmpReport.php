<?php

namespace App\Http\Livewire\Dashboard\Reports\Employee;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;

class EmpReport extends Component
{
    public $exportdata, $employees, $active = 1;
    public function render()
    {
        $this->employees = Employee::with('job')->where('active', $this->active)->get();
        if (count($this->employees) > 0) {
            $this->exportdata      = $this->employees->map(function ($data) {
                return  [
                    trans('tran.emp_code')      => $data->code ?? 'N/A',
                    trans('tran.emp_name')      => $data->name ?? 'N/A',
                    trans('tran.emp_phone')      => $data->phone ?? 'N/A',
                    trans('tran.emp_salery')      => $data->pay_sel ?? 'N/A',
                    trans('tran.emp_position')      => $data->job->jobs_name ?? 'N/A',
                    trans('tran.last_update')      =>  Carbon::parse($data->updated_at)->format('Y/m/d'),
                ];
            });
            $this->emit('export_button', $this->exportdata);
        } else {
            $this->employees = [];
            $this->exportdata = [];
        }
        return view('livewire.dashboard.reports.employee.emp-report');
    }
}
