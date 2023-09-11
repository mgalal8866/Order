<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class ClientReport extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pg = 30, $search = null;
    public $exportview ='livewire.dashboard.reports.client.client-report',  $exportdata ;
    // public function export()
    // {
    //     $dd = $this->exportdata->map(function ($data) {
    //         return collect($data)->only([
    //         'code_client',
    //         'client_name',
    //         'client_fhonewhats',
    //         'client_fhoneLeter',
    //         'client_Balanc',
    //         'client_points',
    //         'client_state',
    //         'updated_at']);
    //     });
    //     return Excel::download(new DataExport($dd ,['#','data']), 'users.xlsx');
    // }
    public function mount()
    {

    }
    public function render()
    {
        $users= User::when($this->search, function ($q) {
             if ($this->search != null) {
                 return    $this->exportdata = $q->where('client_name', 'like', '%' . $this->search . '%')->Orwhere('client_fhonewhats', 'like', '%' . $this->search . '%');
             }
         })->latest()->paginate($this->pg);

         $this->exportdata =  $users->map(function ($data) {
            return  [
                'كود العميل' =>$data->code_client,
                'اسم العميل'=>$data->client_name,
                'تليفون'=>$data->client_fhonewhats,
                'تليفون اخر'=>$data->client_fhoneLeter,
                'رصيد'=>$data->client_Balanc,
                'نقاط'=>$data->client_points,
                'العنوان'=>$data->client_state,
                'اخر تحديث'=>  $data->updated_at->format('d M Y') ];
        });
        $this->emit('export_button', $this->exportdata );

        return view('livewire.dashboard.reports.client.client-report',['users'=>$users]);
    }
}
