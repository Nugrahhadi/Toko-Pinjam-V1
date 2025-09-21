<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// Import model yang ada di Toko Pinjam
use App\Models\Item; // Model untuk barang yang bisa dipinjam
use App\Models\Article; // Model untuk artikel/blog (jika ada)
use App\Models\User; // Model user (untuk halaman profil publik jika ada)

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap for tokopinjam.com SEO optimization';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Generating sitemap for tokopinjam.com...');

        try {
            // Set domain untuk sitemap
            $domain = 'https://tokopinjam.com';

            // Buat sitemap
            $sitemap = Sitemap::create();

            // Add static URLs
            $this->addStaticUrls($sitemap, $domain);

            // Add dynamic URLs from database
            $this->addItemUrls($sitemap, $domain);
            $this->addArticleUrls($sitemap, $domain);

            // Write sitemap to public folder
            $sitemap->writeToFile(public_path('sitemap.xml'));

            $this->info('✅ Sitemap generated successfully at: ' . public_path('sitemap.xml'));
            $this->info('📍 Total URLs: ' . count($sitemap->getTags()));
            $this->info('🌐 Sitemap URL: https://tokopinjam.com/sitemap.xml');

            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Error generating sitemap: ' . $e->getMessage());
            return 1;
        }
    }

    /**
     * Add static URLs to sitemap
     */
    private function addStaticUrls($sitemap, $domain)
    {
        $staticUrls = [
            ['url' => '/', 'priority' => 1.0, 'freq' => Url::CHANGE_FREQUENCY_DAILY],
            ['url' => '/tentang-kami', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/all-items', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_DAILY],
            ['url' => '/faq', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/kontak', 'priority' => 0.7, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/tujuan-dan-visi', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/donasi', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/chapter-purwokerto', 'priority' => 0.7, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/login', 'priority' => 0.5, 'freq' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/register-toko', 'priority' => 0.5, 'freq' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/syarat-ketentuan', 'priority' => 0.6, 'freq' => Url::CHANGE_FREQUENCY_YEARLY],
        ];

        foreach ($staticUrls as $urlData) {
            $sitemap->add(
                Url::create($domain . $urlData['url'])
                    ->setLastModificationDate(now())
                    ->setChangeFrequency($urlData['freq'])
                    ->setPriority($urlData['priority'])
            );
        }
    }

    /**
     * Add item URLs to sitemap
     */
    private function addItemUrls($sitemap, $domain)
    {
        try {
            // Ambil semua item yang aktif berdasarkan kolom is_active
            $items = Item::where('is_active', true)->get();

            foreach ($items as $item) {
                $sitemap->add(
                    Url::create($domain . "/items/{$item->id}")
                        ->setLastModificationDate($item->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8)
                );
            }

            $this->info("📦 Added {$items->count()} items to sitemap");
        } catch (\Exception $e) {
            $this->warn("⚠️ Could not add items to sitemap: " . $e->getMessage());
        }
    }

    /**
     * Add article URLs to sitemap (jika ada sistem blog)
     */
    private function addArticleUrls($sitemap, $domain)
    {
        try {
            // Check if Article model exists dan ada data
            if (class_exists('App\Models\Article')) {
                $articles = Article::where('published', true)->get();

                foreach ($articles as $article) {
                    $sitemap->add(
                        Url::create($domain . "/articles/{$article->slug}")
                            ->setLastModificationDate($article->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.7)
                    );
                }

                $this->info("📰 Added {$articles->count()} articles to sitemap");
            }
        } catch (\Exception $e) {
            $this->warn("⚠️ Could not add articles to sitemap: " . $e->getMessage());
        }
    }
}
