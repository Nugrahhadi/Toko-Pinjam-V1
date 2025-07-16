<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\LandingPage;
use App\Livewire\AllItemsPage;
use App\Livewire\SuperTeam;

Route::get('/', LandingPage::class)->name('home');
Route::get('/semua-barang', AllItemsPage::class)->name('all-items');
Route::get('/super-team', SuperTeam::class)->name('super-team');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
