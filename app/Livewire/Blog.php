<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Blog extends Component
{
    public $categories = ['Siaran pers', 'Pengumuman'];
    public $authors = ['Admin', 'Tim Editorial']; // ganti sesuai kebutuhan

    public function render()
    {
        $posts = Post::where('status', 'published')
                    ->latest()
                    ->get();

        return view('livewire.blog', [
            'posts' => $posts,
            'categories' => $this->categories,
            'authors' => $this->authors
        ])->layout('layouts.guest');
    }
}
