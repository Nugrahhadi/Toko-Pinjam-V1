<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SanitizeResponse
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! method_exists($response, 'getContent') || ! method_exists($response, 'setContent')) {
            return $response;
        }

        $content = $response->getContent();

        if (! is_string($content) || $content === '') {
            return $response;
        }

        $sanitized = self::sanitizeHtmlInjection($content);

        if ($sanitized !== $content) {
            Log::warning('Sanitized injected HTML from response', [
                'url' => $request->fullUrl(),
                'method' => $request->method(),
            ]);

            $response->setContent($sanitized);
        }

        return $response;
    }

    /**
     * Strip known injected HTML snippets from rendered output.
     */
    public static function sanitizeHtmlInjection(string $content): string
    {
        $patterns = [
            '/<div[^>]*style=["\'][^"\']*display\s*:\s*none[^"\']*["\'][^>]*>\s*<a[^>]*href=["\']https:\/\/ft\.unmuhjember\.ac\.id\/["\'][^>]*>.*?<\/a>\s*<\/div>\s*/si',
            '/<div[^>]*>\s*<a[^>]*href=["\']https:\/\/ft\.unmuhjember\.ac\.id\/["\'][^>]*>.*?<\/a>\s*<\/div>\s*/si',
        ];

        $sanitized = preg_replace($patterns, '', $content);

        return is_string($sanitized) ? $sanitized : $content;
    }
}
