<?php

namespace App\Services;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImageService
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Upload and compress featured image for blog posts
     * 
     * @param UploadedFile $file
     * @param string $folder
     * @return string|null
     */
    public function uploadFeaturedImage(UploadedFile $file, string $folder = 'featured-images'): ?string
    {
        try {
            // Generate unique filename
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $path = $folder . '/' . $filename;

            // Read and compress image
            $image = $this->manager->read($file->getPathname());

            // Resize to maximum width of 800px while maintaining aspect ratio
            $image->scaleDown(width: 800);

            // Compress with 85% quality for optimal balance between size and quality
            $encodedImage = $image->toJpeg(quality: 85);

            // Store the compressed image
            Storage::disk('public')->put($path, $encodedImage);

            return $path;
        } catch (\Exception $e) {
            Log::error('Image upload failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Upload and compress regular content images
     * 
     * @param UploadedFile $file
     * @param string $folder
     * @return string|null
     */
    public function uploadContentImage(UploadedFile $file, string $folder = 'content-images'): ?string
    {
        try {
            // Generate unique filename
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $path = $folder . '/' . $filename;

            // Read and compress image
            $image = $this->manager->read($file->getPathname());

            // Resize to maximum width of 1200px for content images
            $image->scaleDown(width: 1200);

            // Compress with 90% quality for content images
            $encodedImage = $image->toJpeg(quality: 90);

            // Store the compressed image
            Storage::disk('public')->put($path, $encodedImage);

            return $path;
        } catch (\Exception $e) {
            Log::error('Content image upload failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Delete image from storage
     * 
     * @param string $path
     * @return bool
     */
    public function deleteImage(string $path): bool
    {
        try {
            if (Storage::disk('public')->exists($path)) {
                return Storage::disk('public')->delete($path);
            }
            return true;
        } catch (\Exception $e) {
            Log::error('Image deletion failed: ' . $e->getMessage());
            return false;
        }
    }
}
