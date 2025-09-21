<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// === SEO AUTOMATION ===
// Generate sitemap setiap hari untuk SEO optimization
Schedule::command('sitemap:generate')->daily()->at('00:00')
    ->description('Generate XML sitemap for tokopinjam.com');

// Submit sitemap ke search engines setelah generate (5 menit kemudian)
Schedule::command('sitemap:submit --ping')->daily()->at('00:05')
    ->description('Submit sitemap to Google, Bing & Yandex');

// Generate sitemap seminggu sekali untuk backup
Schedule::command('sitemap:generate')->weekly()->sundays()->at('02:00')
    ->description('Weekly sitemap generation backup');
