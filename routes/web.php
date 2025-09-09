<?php

use App\Livewire\HomePage;
use App\Livewire\BrandCrud;
use App\Livewire\Dashboard;
use App\Livewire\LoginForm;
use App\Livewire\VehicleDetail;
use App\Http\Livewire\LandingPage;
use App\Livewire\ClientsCrud;
use App\Livewire\VehicleCrud;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/vehicle-detail', VehicleDetail::class)->name('vehicle.detail');
Route::get('/login', LoginForm::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/brands', BrandCrud::class)->name('brands');
Route::get('/vehicles', VehicleCrud::class)->name('vehicles');
Route::get('/clients', ClientsCrud::class)->name('clients');





