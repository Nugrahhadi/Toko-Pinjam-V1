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
use App\Livewire\PinjamSekarang;
use App\Livewire\ChapterPurwokerto;
use App\Livewire\BlogDetail;
use App\Http\Controllers\BlogController;
use App\Livewire\SyaratKetentuan;
use App\Livewire\ArticleEditorSimple;
use App\Livewire\ArticleEditorTrix;
use App\Http\Controllers\DonasiController;
use App\Livewire\HalamanDonasi;
use App\Livewire\UserProfile;
use App\Livewire\TujuanDanVisi;

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
Route::post('/upload-content-image', [BlogController::class, 'uploadContentImage'])->name('upload-content-image');
Route::get('/pinjam-sekarang', PinjamSekarang::class)->name('pinjam-sekarang');
Route::get('/syarat-ketentuan', SyaratKetentuan::class)->name('syarat-ketentuan');
Route::get('/chapter-purwokerto', ChapterPurwokerto::class)->name('chapter-purwokerto');
Route::get('/tujuan-dan-visi', TujuanDanVisi::class)->name('tujuan-dan-visi');
Route::get('/donasi', HalamanDonasi::class)->name('donasi');

// User Profile Routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', UserProfile::class)->name('profile');

    // Article Writing Routes - Trix Editor (Active) & CKEditor (Backup)
    Route::get('/tulis-artikel-sederhana', ArticleEditorTrix::class)->name('write-article-simple');
    // Route::get('/tulis-artikel-ckeditor', ArticleEditorSimple::class)->name('write-article-ckeditor');
});

// Custom Auth Routes
Route::middleware('guest')->group(function () {
    Route::view('/register-custom', 'register')->name('register.custom');
    Route::view('/login-custom', 'login')->name('login.custom');
    Route::view('/login', 'login')->name('login'); // Default login route
});

// Admin Routes - Protected by admin middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Blog Management Routes
    Route::get('/blog', App\Livewire\Admin\BlogManagement::class)->name('blog');
    Route::get('/blog/create', App\Livewire\Admin\BlogEditor::class)->name('blog.create');
    Route::get('/blog/{postId}/edit', App\Livewire\Admin\BlogEditor::class)->name('blog.edit');

    // Items Management Routes
    Route::get('/items', App\Livewire\Admin\ItemManagement::class)->name('items');
    Route::get('/items/create', App\Livewire\Admin\ItemEditor::class)->name('items.create');
    Route::get('/items/{itemId}/edit', App\Livewire\Admin\ItemEditor::class)->name('items.edit');
    Route::get('/rentals/create', App\Livewire\Admin\RentalCreate::class)->name('rentals.create');
    // User Management Routes
    Route::get('/users', App\Livewire\Admin\UserManagement::class)->name('users');
    Route::get('/users/create', App\Livewire\Admin\UserEditor::class)->name('users.create');
    Route::get('/users/{userId}/edit', App\Livewire\Admin\UserEditor::class)->name('users.edit');
});

require __DIR__ . '/auth.php';
