<?php

namespace App\Livewire;

use Livewire\Component;

class VehicleCrud extends Component
{
    public function render()
    {
        return view('livewire.vehicle-crud')->layout('layouts.admin');
    }
}
