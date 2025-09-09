<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandCrud extends Component
{
    public $brands, $name, $brand_id;
    public $modalTitle = 'Shto Markë të Re';
    public $isEditMode = false;
    use WithPagination;


    protected $rules = [
        'name' => 'required|min:2|max:50|unique:brands,name',
    ];

    public function render()
    {
        $this->brands = Brand::orderBy('id', 'desc')->get();
        return view('livewire.brand-crud')->layout('layouts.app');
    }

    public function openCreateModal()
    {
        $this->resetFields();
        $this->modalTitle = 'Shto Markë';
        $this->isEditMode = false;
        $this->dispatch('openModal');
    }


    public function store()
    {
        $this->validate();
        Brand::create(['name' => $this->name]);
        $this->resetFields();
        $this->dispatch('closeModal');
        $this->dispatch('showSuccess');
        $this->dispatch('show-success', 'Marka u shtua me sukses!');
    }


    public function openEditModal($id)
    {
        $brand = Brand::findOrFail($id);
        $this->brand_id = $brand->id;
        $this->name = $brand->name;
        $this->modalTitle = 'Përditëso Markën';
        $this->isEditMode = true;
        $this->dispatch('openModal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:2|max:50|unique:brands,name,' . $this->brand_id,
        ]);

        $brand = Brand::findOrFail($this->brand_id);
        $brand->update(['name' => $this->name]);
        $this->dispatch('closeModal');
        $this->dispatch('showSuccess');
        $this->dispatch('show-success', 'Marka u perditesua me sukses!');
        $this->resetFields();
    }

    public function delete($id)
    {
        Brand::findOrFail($id)->delete();
        $this->dispatch('showSuccess');
        $this->dispatch('show-success', 'Marka u fshi me sukses!');
    }

    private function resetFields()
    {
        $this->name = '';
        $this->brand_id = null;
        $this->isEditMode = false;
    }
}
