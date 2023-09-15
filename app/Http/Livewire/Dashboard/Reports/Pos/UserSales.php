<?php

namespace App\Http\Livewire\Dashboard\Reports\Pos;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\userdesck;

class UserSales extends Component
{
    public $invotype = ['id' => '1', 'type' => 'sales'], $username = ' ', $shifts = [],  $userdesck, $fromdate, $todate, $exportdata = [], $selected = "";
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }
    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->userdesck        =  userdesck::get();
    }
    public function render()
    {
        return view('livewire.dashboard.reports.pos.user-sales');
    }
}
