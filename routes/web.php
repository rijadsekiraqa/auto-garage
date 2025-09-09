<?php

use App\Livewire\HomePage;
use App\Livewire\BrandCrud;
use App\Livewire\Dashboard;
use App\Livewire\LoginForm;
use App\Http\Livewire\LandingPage;
use App\Livewire\ClientsCrud;
use App\Livewire\ServiceCrud;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginForm::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/brands', BrandCrud::class)->name('brands');
Route::get('/clients', ClientsCrud::class)->name('clients');
Route::get('/services', ServiceCrud::class)->name('services');





