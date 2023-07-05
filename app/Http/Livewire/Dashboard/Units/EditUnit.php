<?php

namespace App\Http\Livewire\Dashboard\Units;

use App\Models\unit;
use Livewire\Component;

class EditUnit extends Component
{
    public $idunit, $name, $state, $note;
    public function mount($id)
    {
        $this->idunit = $id;
        $unit = unit::find($id);
        $this->name = $unit->unit_name;
        $this->note = $unit->unit_note;
        $this->state =  $unit->unit_active==1?true:false;
    }
    public function saveunit()
    {

        $unit = unit::find( $this->idunit);
        $unit->update([
            'unit_name'   =>$this->name,
            'unit_note'   =>$this->note,
            'unit_active' =>$this->state,
          ]);


    }
    public function render()
    {
        return view('livewire.dashboard.units.edit-unit');
    }
}
