<?php

namespace App\Livewire;

use Livewire\Component;

class ServiceCrud extends Component
{
    public function render()
    {
        return view('livewire.service-crud')->layout('layouts.app');
    }
}
