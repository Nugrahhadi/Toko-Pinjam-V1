<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\DonationLeaderboard;

class BlogDetail extends Component
{
    public $post;
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;

        // Try to find by slug first, then by ID if slug not found
        $this->post = Post::where('slug', $slug)
            ->orWhere('id', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment view count
        $this->post->increment('views');
    }

    public function getTopDonors()
    {
        // Get real data from donation_leaderboards table
        $topDonors = DonationLeaderboard::with('user')
            ->orderBy('amount', 'desc')
            ->take(5)
            ->get()
            ->map(function ($donor) {
                return [
                    'name' => $donor->display_name ?: ($donor->user->full_name ?? $donor->user->name ?? 'Donatur Anonim'),
                    'amount' => $donor->amount,
                    'avatar' => $donor->user->avatar ?? null
                ];
            });

        // If no real data exists, return sample data
        if ($topDonors->isEmpty()) {
            return [
                ['name' => 'Ahmad Wijaya', 'amount' => 5000000, 'avatar' => null],
                ['name' => 'Siti Nurhaliza', 'amount' => 3500000, 'avatar' => null],
                ['name' => 'Budi Santoso', 'amount' => 2800000, 'avatar' => null],
                ['name' => 'Maya Indira', 'amount' => 2200000, 'avatar' => null],
                ['name' => 'Rizki Pratama', 'amount' => 1800000, 'avatar' => null],
            ];
        }

        return $topDonors->toArray();
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
