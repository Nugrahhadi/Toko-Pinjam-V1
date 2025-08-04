<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\LandingPage;
use App\Livewire\AllItemsPage;
use App\Livewire\AiUsage;
use App\Livewire\ContactPage;
use App\Livewire\SuperTeam;
use App\Livewire\FaqPage;
use App\Livewire\LaporanKeuangan;
use App\Livewire\BergabungSuperTeam;
use App\Livewire\Blog;
use App\Livewire\ArticleEditor;
use App\Livewire\PinjamSekarang;
use App\Livewire\ChapterPurwokerto;
use App\Livewire\BlogDetail;
use App\Http\Controllers\BlogController;
use App\Livewire\SyaratKetentuan;
use App\Livewire\RegisterForm;
use App\Livewire\LoginForm;

Route::get('/', LandingPage::class)->name('home');
Route::get('/semua-barang', AllItemsPage::class)->name('all-items');
Route::get('/ai-usage', AiUsage::class)->name('ai-usage');
Route::get('/kontak', ContactPage::class)->name('kontak');
Route::get('/super-team', SuperTeam::class)->name('super-team');
Route::get('/faq', FaqPage::class)->name('faq');
Route::get('/laporan-keuangan', LaporanKeuangan::class)->name('laporan-keuangan');
Route::get('/bergabung-super-team', BergabungSuperTeam::class)->name('bergabung-super-team');
Route::view('/acknowledgement', 'livewire.acknowledgement')->name('acknowledgement');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog/{slug}', BlogDetail::class)->name('blog.detail');
Route::view('/tulis-artikel', 'write-article')->name('write-article');
Route::view('/write-article', 'write-article')->name('create-post'); // Alias untuk backward compatibility
Route::post('/upload-content-image', [BlogController::class, 'uploadContentImage'])->name('upload-content-image');
Route::get('/pinjam-sekarang', PinjamSekarang::class)->name('pinjam-sekarang');
Route::get('/syarat-ketentuan', SyaratKetentuan::class)->name('syarat-ketentuan');
Route::get('/chapter-purwokerto', ChapterPurwokerto::class)->name('chapter-purwokerto');

// Custom Auth Routes
Route::middleware('guest')->group(function () {
    Route::view('/register-custom', 'register')->name('register.custom');
    Route::view('/login-custom', 'login')->name('login.custom');
});

// Syarat & Ketentuan
Route::view('/syarat-ketentuan', 'syarat-ketentuan')->name('syarat-ketentuan');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
