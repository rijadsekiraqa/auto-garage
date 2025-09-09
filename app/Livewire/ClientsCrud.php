<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;

class ClientsCrud extends Component
{
    use WithPagination;

    public $clients, $name, $lastname, $phone, $client_id;
    public $modalTitle = 'Shto Klient të Ri';
    public $isEditMode = false;
    public $isOpen = false;
    public $selectedClient;
    public $brands;
    public $car_name;
    public $car_brand;
    public $transmission;
    public $year;
    public $cubical;
    public $power;
    public $selectedCar = [];
    public $cars = [];


    protected $rules = [
        'name' => 'required|string|min:3',
        'lastname' => 'required|string|min:3',
        'phone' => 'nullable|string|max:20',
    ];

    public function render()
    {

        $this->clients = Client::orderBy('id', 'desc')->get();
        $this->brands = Brand::orderBy('name', 'asc')->get();
        return view('livewire.clients-crud')->layout('layouts.admin');
    }


    public function openCreateModal()
    {
        $this->resetFields();
        $this->modalTitle = 'Regjistrimi i Klientit';
        $this->isEditMode = false;
        $this->dispatch('openModal');
    }

    public function openCarDetails($carId)
    {
        $car = Car::with('brand')->findOrFail($carId);
        $this->car_name = $car->name;
        $this->car_brand = $car->brand_id;
        $this->transmission = $car->transmission;
        $this->year = $car->year;
        $this->cubical = $car->cubical;
        $this->power = $car->power;
        $this->dispatch('openCarDetailsModal');
    }


    public function openCarModal($clientId)
    {
        $this->resetCarFields();
        $this->client_id = $clientId;
        $this->cars = [
            ['car_name' => '', 'car_brand' => '', 'transmission' => '', 'year' => '', 'cubical' => '', 'power' => '']
        ];
        $this->dispatch('openModalCar');
    }

    public function addCarField()
    {
        $this->cars[] = ['car_name' => '', 'car_brand' => '', 'transmission' => '', 'year' => '', 'cubical' => '', 'power' => ''];
    }

    public function removeCarField($index)
    {
        unset($this->cars[$index]);
        $this->cars = array_values($this->cars);
    }

    public function viewClient($clientId)
    {
        $client = Client::with(['cars.brand'])->findOrFail($clientId);

        $this->name = $client->name;
        $this->lastname = $client->lastname;
        $this->phone = $client->phone;

        $this->selectedCar = $client->cars->map(function ($car) {
            return [
                'car_name'     => $car->name,
                'car_brand'    => $car->brand_id,
                'transmission' => $car->transmission,
                'year'         => $car->year,
                'cubical'      => $car->cubical,
                'power'        => $car->power,
            ];
        })->toArray();

        // Nëse ka vetura, hap modalin
        $this->dispatch('openClientDetailsModal');
    }


    public function openEditModal($id)
    {
        $client = Client::with('cars')->findOrFail($id);

        // 1️⃣ Vendos të dhënat e klientit
        $this->client_id = $client->id;
        $this->name = $client->name;
        $this->lastname = $client->lastname;
        $this->phone = $client->phone;

        // 2️⃣ Konverto Collection të veturave në array numerik për Livewire
        $this->cars = $client->cars->map(function ($car) {
            return [
                'car_name'     => $car->name,
                'car_brand'    => $car->brand_id,
                'transmission' => $car->transmission,
                'year'         => $car->year,
                'cubical'      => $car->cubical,
                'power'        => $car->power,
            ];
        })->toArray();

        // 3️⃣ Vendos modalin në edit mode
        $this->modalTitle = 'Përditëso Klientin & Veturat';
        $this->isEditMode = true;

        // 4️⃣ Hap modalin
        $this->dispatch('openModal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'phone' => 'nullable|string|max:20',
        ]);

        $client = Client::findOrFail($this->client_id);
        $client->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
        ]);

        // Fshij veturat që u larguan
        $existingCarIds = $client->cars->pluck('id')->toArray(); // veturat ekzistuese
        $submittedCarIds = array_filter(array_column($this->cars, 'id')); // ato që ende janë në modal

        $carsToDelete = array_diff($existingCarIds, $submittedCarIds);
        if (!empty($carsToDelete)) {
            Car::whereIn('id', $carsToDelete)->delete();
        }

        // Përditëso ose krijo veturat
        foreach ($this->cars as $carData) {
            if (isset($carData['id'])) {
                // update vetura ekzistuese
                $car = Car::find($carData['id']);
                if ($car) {
                    $car->update([
                        'name' => $carData['car_name'],
                        'brand_id' => $carData['car_brand'],
                        'transmission' => $carData['transmission'],
                        'year' => $carData['year'],
                        'cubical' => $carData['cubical'],
                        'power' => $carData['power'],
                    ]);
                }
            } else {
                // krijo vetura e re
                if (!empty($carData['car_name']) && !empty($carData['car_brand'])) {
                    Car::create([
                        'client_id' => $this->client_id,
                        'name' => $carData['car_name'],
                        'brand_id' => $carData['car_brand'],
                        'transmission' => $carData['transmission'],
                        'year' => $carData['year'],
                        'cubical' => $carData['cubical'],
                        'power' => $carData['power'],
                    ]);
                }
            }
        }

        $this->dispatch('closeModal');
        $this->dispatch('show-success', 'Klienti dhe veturat u përditësuan me sukses!');
    }





    public function closeModal()
    {
        $this->isOpen = false;
        $this->cars = [];
    }

    private function resetInput()
    {
        $this->name = '';
        $this->lastname = '';
        $this->phone = '';
    }

    public function store()
    {
        $this->validate();

        $client = Client::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
        ]);

        // Marrim vetëm veturat që janë plotësuar
        $filledCars = array_filter($this->cars, function ($car) {
            return !empty($car['car_name']) && !empty($car['car_brand']);
        });

        if (!empty($filledCars)) {
            foreach ($filledCars as $car) {
                Car::create([
                    'client_id'    => $client->id,
                    'name'         => $car['car_name'],
                    'brand_id'     => $car['car_brand'],
                    'transmission' => $car['transmission'],
                    'year'         => $car['year'],
                    'cubical'      => $car['cubical'],
                    'power'        => $car['power'],
                ]);
            }
        }

        $this->dispatch('closeModal');
        $this->dispatch('show-success', 'Klienti dhe veturat u regjistruan me sukses!');

        $this->resetInput();
        $this->resetCarFields();
    }



    public function storeCar()
    {
        $numCars = count($this->cars);
        foreach ($this->cars as $car) {
            Car::create([
                'client_id'    => $this->client_id,
                'name'         => $car['car_name'],
                'brand_id'     => $car['car_brand'],
                'transmission' => $car['transmission'],
                'year'         => $car['year'],
                'cubical'      => $car['cubical'],
                'power'        => $car['power'],
            ]);
        }

        $this->dispatch('closeModal');
        // Kontrolloj numrin dhe shfaq mesazhin përkatës
        if ($numCars === 1) {
            $this->dispatch('show-success', 'Vetura u regjistrua me sukses!');
        } else {
            $this->dispatch('show-success', 'Veturat u regjistruan me sukses!');
        }

        $this->resetCarFields();
    }


    private function resetFields()
    {
        $this->name = '';
        $this->client_id = null;
        $this->isEditMode = false;
    }

    private function resetCarFields()
    {
        $this->car_name = '';
        $this->car_brand = '';
        $this->transmission = '';
        $this->year = '';
        $this->cubical = '';
        $this->power = '';
        $this->cars = []; // <- Kjo është kyçe
    }


    public function delete($id)
    {
        Client::findOrFail($id)->delete();
        $this->dispatch('showSuccess');
        $this->dispatch('show-success', 'Klienti u fshi me sukses!');
    }
}
