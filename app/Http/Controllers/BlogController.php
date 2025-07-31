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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ]);

        try {
            $file = $request->file('image');
            $path = $this->imageService->uploadContentImage($file);

            if ($path) {
                return response()->json([
                    'success' => true,
                    'url' => asset('storage/' . $path),
                    'path' => $path
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to upload image'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
