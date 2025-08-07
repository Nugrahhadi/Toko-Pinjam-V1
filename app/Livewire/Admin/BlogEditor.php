<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogEditor extends Component
{
    public $postId = null;
    public $title = '';
    public $slug = '';
    public $description = '';
    public $content = '';
    public $status = 'draft';
    public $isEditing = false;

    protected $rules = [
        'title' => 'required|min:5|max:255',
        'description' => 'nullable|max:500',
        'content' => 'required|min:50',
        'status' => 'in:draft,published'
    ];

    protected $messages = [
        'title.required' => 'Judul artikel wajib diisi.',
        'title.min' => 'Judul artikel minimal 5 karakter.',
        'title.max' => 'Judul artikel maksimal 255 karakter.',
        'description.max' => 'Deskripsi maksimal 500 karakter.',
        'content.required' => 'Konten artikel wajib diisi.',
        'content.min' => 'Konten artikel minimal 50 karakter.',
    ];

    public function mount($postId = null)
    {
        if ($postId) {
            $this->isEditing = true;
            $this->postId = $postId;
            $this->loadPost();
        }
    }

    public function loadPost()
    {
        $post = Post::findOrFail($this->postId);

        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->description = $post->description;
        $this->content = $post->content;
        $this->status = $post->status;
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function saveDraft()
    {
        $this->status = 'draft';
        $this->save();
    }

    public function publish()
    {
        $this->status = 'published';
        $this->save();
    }

    public function save()
    {
        $this->validate();

        // Generate slug if empty
        if (empty($this->slug)) {
            $this->slug = Str::slug($this->title);
        }

        // Ensure unique slug
        $originalSlug = $this->slug;
        $counter = 1;

        while (Post::where('slug', $this->slug)
            ->when($this->isEditing, function ($query) {
                return $query->where('id', '!=', $this->postId);
            })
            ->exists()
        ) {
            $this->slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'content' => $this->content,
            'status' => $this->status,
            'editor_id' => Auth::id(),
        ];

        if ($this->status === 'published') {
            $data['published_at'] = now();
        } else {
            $data['published_at'] = null;
        }

        if ($this->isEditing) {
            $post = Post::findOrFail($this->postId);
            $post->update($data);
            $message = $this->status === 'published' ? 'Artikel berhasil dipublikasikan!' : 'Artikel berhasil disimpan sebagai draft!';
        } else {
            $data['user_id'] = Auth::id(); // Set original author
            Post::create($data);
            $message = $this->status === 'published' ? 'Artikel berhasil dibuat dan dipublikasikan!' : 'Artikel berhasil dibuat sebagai draft!';
        }

        session()->flash('message', $message);

        return redirect()->route('admin.blog');
    }

    public function cancel()
    {
        return redirect()->route('admin.blog');
    }

    public function render()
    {
        return view('livewire.admin.blog-editor')->extends('layouts.admin')->section('content');
    }
}
