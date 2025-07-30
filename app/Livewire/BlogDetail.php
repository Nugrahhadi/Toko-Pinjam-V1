<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class BlogDetail extends Component
{
    public $post;
    public $slug;
    
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->post = Post::where('slug', $slug)->firstOrFail();
        
        // Increment view count
        $this->post->increment('views');
    }

    public function getTopDonors()
    {
        // Mock data untuk top donors - sesuaikan dengan model donation Anda
        return [
            ['name' => 'Ahmad Wijaya', 'amount' => 5000000, 'avatar' => 'donor1.jpg'],
            ['name' => 'Siti Nurhaliza', 'amount' => 3500000, 'avatar' => 'donor2.jpg'],
            ['name' => 'Budi Santoso', 'amount' => 2800000, 'avatar' => 'donor3.jpg'],
            ['name' => 'Maya Indira', 'amount' => 2200000, 'avatar' => 'donor4.jpg'],
            ['name' => 'Rizki Pratama', 'amount' => 1800000, 'avatar' => 'donor5.jpg'],
        ];
    }

    public function getRecentPosts()
    {
        return Post::where('id', '!=', $this->post->id)
                   ->where('status', 'published')
                   ->orderBy('created_at', 'desc')
                   ->take(5)
                   ->get();
    }

    public function render()
    {
        return view('livewire.blog-detail');
    }
}
