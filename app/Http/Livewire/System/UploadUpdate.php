<?php

namespace App\Http\Livewire\System;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadUpdate extends Component
{
    use WithFileUploads;

    public $version , $file;
    public $formattedVersion;


    public function save()
    {


        $fileName = time() . '_' . $this->file->getClientOriginalName();
        $this->file->storeAs('/', $fileName, 'update');
        // dd($this->version , $this->file);
        $jsonFile = public_path('update/data.json');;
        $newData = [
            'new_version' => $this->version ,
        ];
        $jsonData = json_encode($newData, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $jsonData);
    }
    public function render()
    {
        return view('livewire.system.upload-update')->layout('layouts.System.layout');
    }
}
