<?php
namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(20)->get(); // atau pakai pagination
        $categories = Post::select('category')->distinct()->pluck('category');
        $authors = Post::select('author')->distinct()->pluck('author');

        return view('livewire.blog', compact('posts', 'categories', 'authors'));
    }
}

