<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $posts = Post::latest()->take(20)->get(); // atau pakai pagination
        $categories = Post::select('category')->distinct()->pluck('category');
        $authors = Post::select('author')->distinct()->pluck('author');

        return view('livewire.blog', compact('posts', 'categories', 'authors'));
    }

    /**
     * Upload content image for blog editor
     */
    public function uploadContentImage(Request $request): JsonResponse
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ]);

        try {
            $file = $request->file('upload');
            $path = $this->imageService->uploadContentImage($file);

            if ($path) {
                $url = asset('storage/' . $path);

                // Return format expected by CKEditor
                return response()->json([
                    'uploaded' => true,
                    'url' => $url,
                    'fileName' => basename($path)
                ]);
            } else {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'Failed to upload image'
                    ]
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => 'Upload failed: ' . $e->getMessage()
                ]
            ], 500);
        }
    }
}
