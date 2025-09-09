<?php

namespace App\Livewire;

use Livewire\Component;

class VehicleDetail extends Component
{
    public function render()
    {
        return view('livewire.vehicle-detail')->layout('layouts.app');
    }
}
