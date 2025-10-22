<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Blog extends Component
{
    public $search = '';
    public $categories = ['Siaran pers', 'Pengumuman'];
    public $authors = ['Admin', 'Tim Editorial']; // ganti sesuai kebutuhan

    public function render()
    {
        $query = Post::where('status', 'published');
        
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }
        
        $posts = $query->latest()->get();

        return view('livewire.blog', [
            'posts' => $posts,
            'categories' => $this->categories,
            'authors' => $this->authors
        ]);
    }
}
