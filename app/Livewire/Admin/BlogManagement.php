<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BlogManagement extends Component
{
    use WithPagination;

    public $filter = 'all'; // all, draft, published
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $showDeleteModal = false;
    public $deletePostId = null;

    protected $queryString = [
        'filter' => ['except' => 'all'],
        'search' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function mount()
    {
        $this->filter = request('filter', 'all');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function publishPost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->update([
            'status' => 'published',
            'published_at' => now()
        ]);

        session()->flash('message', 'Artikel berhasil dipublikasikan!');
    }

    public function draftPost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->update([
            'status' => 'draft',
            'published_at' => null
        ]);

        session()->flash('message', 'Artikel berhasil dijadikan draft!');
    }

    public function confirmDelete($postId)
    {
        $this->deletePostId = $postId;
        $this->showDeleteModal = true;
    }

    public function deletePost()
    {
        if ($this->deletePostId) {
            Post::findOrFail($this->deletePostId)->delete();
            $this->showDeleteModal = false;
            $this->deletePostId = null;
            session()->flash('message', 'Artikel berhasil dihapus!');
        }
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->deletePostId = null;
    }

    public function getPostsProperty()
    {
        $query = Post::with(['user', 'editor'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($userQuery) {
                            $userQuery->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->filter !== 'all', function ($query) {
                $query->where('status', $this->filter === 'published' ? 'published' : 'draft');
            })
            ->orderBy($this->sortBy, $this->sortDirection);

        return $query->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.blog-management', [
            'posts' => $this->posts,
            'totalPosts' => Post::count(),
            'publishedPosts' => Post::where('status', 'published')->count(),
            'draftPosts' => Post::where('status', 'draft')->count(),
        ])->extends('layouts.admin')->section('content');
    }
}
