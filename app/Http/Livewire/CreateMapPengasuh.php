<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateMapPengasuh extends Component
{
    
    public $long, $lat;

    public function render()
    {
        return view('livewire.create-map-pengasuh')->layout('pengasuh.regispengasuh', [
            "head" => "Register Pengasuh | Elderly Caregiver"
        ]);
    }
}
