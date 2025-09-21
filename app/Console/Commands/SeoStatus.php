<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Item;

class SeoStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:status {--detailed : Show detailed SEO analysis}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check SEO status dan optimization tokopinjam.com';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 SEO Status Report untuk TokoPinjam.com');
        $this->info('=====================================');

        // Check sitemap
        $this->checkSitemap();

        // Check robots.txt
        $this->checkRobots();

        // Check content stats
        $this->checkContent();

        // Check Google Analytics
        $this->checkAnalytics();

        if ($this->option('detailed')) {
            $this->detailedAnalysis();
        }

        $this->info('');
        $this->info('🎯 Recommendations:');
        $this->comment('1. Submit sitemap manually to Google Search Console');
        $this->comment('2. Submit sitemap manually to Bing Webmaster Tools');
        $this->comment('3. Add more content regularly untuk improve ranking');
        $this->comment('4. Monitor Google Analytics untuk track performance');

        return 0;
    }

    private function checkSitemap()
    {
        $sitemapPath = public_path('sitemap.xml');

        if (File::exists($sitemapPath)) {
            $size = File::size($sitemapPath);
            $lastModified = File::lastModified($sitemapPath);

            $this->info('✅ Sitemap: EXISTS');
            $this->line("   📍 Location: /sitemap.xml");
            $this->line("   📏 Size: " . number_format($size) . " bytes");
            $this->line("   🕒 Last updated: " . date('Y-m-d H:i:s', $lastModified));

            // Count URLs in sitemap
            $content = File::get($sitemapPath);
            $urlCount = substr_count($content, '<loc>');
            $this->line("   🔗 Total URLs: {$urlCount}");
        } else {
            $this->error('❌ Sitemap: NOT FOUND');
            $this->comment('   Run: php artisan sitemap:generate');
        }
    }

    private function checkRobots()
    {
        $robotsPath = public_path('robots.txt');

        if (File::exists($robotsPath)) {
            $this->info('✅ Robots.txt: EXISTS');
            $content = File::get($robotsPath);
            if (str_contains($content, 'tokopinjam.com/sitemap.xml')) {
                $this->line('   🎯 Sitemap reference: FOUND');
            } else {
                $this->warn('   ⚠️ Sitemap reference: MISSING');
            }
        } else {
            $this->error('❌ Robots.txt: NOT FOUND');
        }
    }

    private function checkContent()
    {
        try {
            $itemCount = Item::where('is_active', true)->count();
            $this->info("📦 Active Items: {$itemCount}");

            // Check recent content
            $recentItems = Item::where('is_active', true)
                ->where('created_at', '>=', now()->subDays(30))
                ->count();
            $this->line("   🆕 Added in last 30 days: {$recentItems}");
        } catch (\Exception $e) {
            $this->warn('⚠️ Could not fetch content stats: ' . $e->getMessage());
        }
    }

    private function checkAnalytics()
    {
        $layoutPath = resource_path('views/layouts/app.blade.php');

        if (File::exists($layoutPath)) {
            $content = File::get($layoutPath);
            if (str_contains($content, 'G-M8ZNPYL87N')) {
                $this->info('✅ Google Analytics: CONFIGURED');
                $this->line('   🆔 Tracking ID: G-M8ZNPYL87N');
            } else {
                $this->warn('⚠️ Google Analytics: NOT CONFIGURED');
            }
        }
    }

    private function detailedAnalysis()
    {
        $this->info('');
        $this->info('📊 Detailed SEO Analysis');
        $this->info('========================');

        // Check meta tags in templates
        $templates = [
            'welcome.blade.php',
            'layouts/app.blade.php',
            'dashboard.blade.php'
        ];

        foreach ($templates as $template) {
            $path = resource_path("views/{$template}");
            if (File::exists($path)) {
                $content = File::get($path);
                $hasTitle = str_contains($content, '<title>');
                $hasDescription = str_contains($content, 'description');
                $hasKeywords = str_contains($content, 'keywords');

                $this->line("📄 {$template}:");
                $this->line("   Title tag: " . ($hasTitle ? '✅' : '❌'));
                $this->line("   Meta description: " . ($hasDescription ? '✅' : '❌'));
                $this->line("   Meta keywords: " . ($hasKeywords ? '✅' : '❌'));
            }
        }
    }
}
