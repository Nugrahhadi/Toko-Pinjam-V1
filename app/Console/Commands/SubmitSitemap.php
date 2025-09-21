<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SubmitSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:submit {--ping : Ping search engines about sitemap updates}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Submit sitemap to search engines (Google, Bing) untuk SEO optimization';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Submitting sitemap to search engines...');

        $sitemapUrl = 'https://tokopinjam.com/sitemap.xml';
        $submitted = 0;

        // Submit ke Google
        try {
            $googlePingUrl = 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl);
            $response = Http::timeout(10)->get($googlePingUrl);

            if ($response->successful()) {
                $this->info('✅ Google: Sitemap submitted successfully');
                $submitted++;
            } else {
                $this->warn('⚠️ Google: Failed to submit sitemap (Status: ' . $response->status() . ')');
            }
        } catch (\Exception $e) {
            $this->warn('⚠️ Google: Error submitting sitemap - ' . $e->getMessage());
        }

        // Submit ke Bing
        try {
            $bingPingUrl = 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl);
            $response = Http::timeout(10)->get($bingPingUrl);

            if ($response->successful()) {
                $this->info('✅ Bing: Sitemap submitted successfully');
                $submitted++;
            } else {
                $this->warn('⚠️ Bing: Failed to submit sitemap (Status: ' . $response->status() . ')');
            }
        } catch (\Exception $e) {
            $this->warn('⚠️ Bing: Error submitting sitemap - ' . $e->getMessage());
        }

        // Submit ke Yandex (optional)
        try {
            $yandexPingUrl = 'https://webmaster.yandex.com/ping?sitemap=' . urlencode($sitemapUrl);
            $response = Http::timeout(10)->get($yandexPingUrl);

            if ($response->successful()) {
                $this->info('✅ Yandex: Sitemap submitted successfully');
                $submitted++;
            } else {
                $this->warn('⚠️ Yandex: Failed to submit sitemap (Status: ' . $response->status() . ')');
            }
        } catch (\Exception $e) {
            $this->warn('⚠️ Yandex: Error submitting sitemap - ' . $e->getMessage());
        }

        // Summary
        $this->info('');
        $this->info("📊 Summary: Submitted to {$submitted}/3 search engines");
        $this->info('🌐 Sitemap URL: ' . $sitemapUrl);

        if ($this->option('ping')) {
            $this->info('🔔 Search engines have been notified of sitemap updates');
        }

        // Instructions for manual submission
        $this->info('');
        $this->comment('💡 For better results, also manually submit your sitemap to:');
        $this->comment('   • Google Search Console: https://search.google.com/search-console');
        $this->comment('   • Bing Webmaster Tools: https://www.bing.com/webmasters');

        return 0;
    }
}
