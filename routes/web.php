<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\LandingPage;
use App\Livewire\AllItemsPage;
use App\Livewire\AiUsage;
use App\Livewire\ContactPage;

Route::get('/', LandingPage::class)->name('home');
Route::get('/semua-barang', AllItemsPage::class)->name('all-items');
Route::get('/ai-usage', AiUsage::class)->name('ai-usage');
Route::view('/acknowledgement', 'livewire.acknowledgement')->name('acknowledgement');
Route::get('/kontak', ContactPage::class)->name('contact');
Route::view('/faq', 'faq')->name('faq');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';