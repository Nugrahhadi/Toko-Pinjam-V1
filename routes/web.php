<?php

use Illuminate\Support\Facades\Route;

// Public Livewire pages
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
use App\Livewire\SyaratKetentuan;
use App\Livewire\ArticleEditorTrix;
use App\Livewire\HalamanDonasi;
use App\Livewire\UserProfile;
use App\Livewire\TujuanDanVisi;
use App\Livewire\ItemDetailPage;

// Controllers
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\ItemController;

// Admin Livewire pages
use App\Livewire\Admin\BlogManagement;
use App\Livewire\Admin\BlogEditor;
use App\Livewire\Admin\ItemManagement;
use App\Livewire\Admin\ItemEditor;
use App\Livewire\Admin\RentalCreate;
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\UserEditor;
use App\Livewire\Admin\DonationPageEditor;
use App\Livewire\Admin\DonationLeaderboardEditor;
use App\Livewire\Admin\DonationTestimonialEditor;
use App\Livewire\Admin\HomepageEditor; 
use App\Livewire\Admin\MediaPartnerEditor;
use App\Livewire\Admin\OurPartnerEditor;

/**
 * --------------------------------------------------------------------------
 * Public routes
 * --------------------------------------------------------------------------
 */
Route::get("/", LandingPage::class)->name("home");
Route::get("/semua-barang", AllItemsPage::class)->name("all-items");
Route::get("/ai-usage", AiUsage::class)->name("ai-usage");
Route::get("/kontak", ContactPage::class)->name("kontak");
Route::get("/super-team", SuperTeam::class)->name("super-team");
Route::get("/faq", FaqPage::class)->name("faq");
Route::get("/laporan-keuangan", LaporanKeuangan::class)->name(
    "laporan-keuangan",
);
Route::get("/bergabung-super-team", BergabungSuperTeam::class)->name(
    "bergabung-super-team",
);
Route::view("/acknowledgement", "livewire.acknowledgement")->name(
    "acknowledgement",
);
Route::get("/blog", Blog::class)->name("blog");
Route::get("/blog/{slug}", BlogDetail::class)->name("blog.detail");
Route::post("/upload-content-image", [
    BlogController::class,
    "uploadContentImage",
])->name("upload-content-image");
Route::get("/pinjam-sekarang", PinjamSekarang::class)->name("pinjam-sekarang");
Route::get("/syarat-ketentuan", SyaratKetentuan::class)->name(
    "syarat-ketentuan",
);
Route::get("/chapter-purwokerto", ChapterPurwokerto::class)->name(
    "chapter-purwokerto",
);
Route::get("/tujuan-dan-visi", TujuanDanVisi::class)->name("tujuan-dan-visi");

/**
 * Halaman Donasi Publik (data dari pengaturan admin)
 */
Route::get("/donasi", HalamanDonasi::class)->name("donasi");

/**
 * Item detail
 */
Route::get("/barang/{slug}", ItemDetailPage::class)->name("items.show");

/**
 * --------------------------------------------------------------------------
 * Protected (auth) routes
 * --------------------------------------------------------------------------
 */
Route::middleware("auth")->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })->name("dashboard");

    Route::get("/profile", UserProfile::class)->name("profile");

    // Penulisan artikel (aktif: Trix)
    Route::get("/tulis-artikel", ArticleEditorTrix::class)->name(
        "write-article-simple",
    );
    // Backup CKEditor (opsional)
    // Route::get('/tulis-artikel-ckeditor', ArticleEditorSimple::class)->name('write-article-ckeditor');
});

/**
 * --------------------------------------------------------------------------
 * Guest-only routes (auth pages kustom)
 * --------------------------------------------------------------------------
 */
Route::middleware("guest")->group(function () {
    Route::view("/register-toko", "register")->name("register.custom");
    Route::view("/login", "login")->name("login.custom");
});

/**
 * --------------------------------------------------------------------------
 * Admin routes (auth + admin)
 * --------------------------------------------------------------------------
 */
Route::middleware(["auth", "admin"])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::get("/", function () {
            return view("admin.dashboard");
        })->name("dashboard");

        /**
         * Blog management
         */
        Route::get("/blog", BlogManagement::class)->name("blog");
        Route::get("/blog/create", BlogEditor::class)->name("blog.create");
        Route::get("/blog/{postId}/edit", BlogEditor::class)->name("blog.edit");

        /**
         * Items management
         */
        Route::get("/items", ItemManagement::class)->name("items");
        Route::get("/items/create", ItemEditor::class)->name("items.create");
        Route::get("/items/{itemId}/edit", ItemEditor::class)->name(
            "items.edit",
        );
        Route::delete("/items/{id}", [ItemController::class, "destroy"])
            ->name("items.destroy");
        Route::patch("/items/{id}/restore", [ItemController::class, "restore"])
            ->name("items.restore");
        Route::get("/rentals/create", RentalCreate::class)->name(
            "rentals.create",
        );

        /**
         * Users management
         */
        Route::get("/users", UserManagement::class)->name("users");
        Route::get("/users/create", UserEditor::class)->name("users.create");
        Route::get("/users/{userId}/edit", UserEditor::class)->name(
            "users.edit",
        );
        
        /**
         * Homepage management
         */
        Route::prefix("homepage")
            ->name("homepage.")
            ->group(function () {
                // Halaman Ringkasan (Overview Beranda)
                Route::get("/", HomepageEditor::class)->name("index"); 

                // Halaman Editor Detail Partner Media
                Route::get("/media-partners", MediaPartnerEditor::class)->name("media-partners"); 
                Route::get("/our-partners", OurPartnerEditor::class)->name("our-partners"); 
            });
        
        /**
         * Donation management
         * - index  : ringkas (Top 3 & 5 testimoni terbaru + settings)
         * - detail : leaderboard (Top 10 editor)
         * - detail : testimonials (CRUD + pagination 10)
         */

        // ... (rute admin lain)

        Route::get(
            "/transactions",
            App\Livewire\Admin\TransactionManagement::class,
        )->name("transactions");

        Route::prefix("donation")
            ->name("donation.")
            ->group(function () {
                Route::get("/", DonationPageEditor::class)->name("index"); // Donasi Editor (ringkas)
                Route::get(
                    "/leaderboard",
                    DonationLeaderboardEditor::class,
                )->name("leaderboard"); // Detail Leaderboard (Top 10)
                Route::get(
                    "/testimonials",
                    DonationTestimonialEditor::class,
                )->name("testimonials"); // Detail Testimoni
            });
    });

require __DIR__ . "/auth.php";