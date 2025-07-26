<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{
    public $title = '';
    public $category = '';
    public $author = '';
    public $author_phone = '';
    public $content = '';
    public $showSuccessAlert = false;

    protected $rules = [
        'title' => 'required|min:3',
        'category' => 'required',
        'author' => 'required|min:2',
        'content' => 'required|min:10',
    ];

    protected $messages = [
        'title.required' => 'Judul harus diisi',
        'title.min' => 'Judul minimal 3 karakter',
        'category.required' => 'Kategori harus dipilih',
        'author.required' => 'Nama penulis harus diisi',
        'author.min' => 'Nama penulis minimal 2 karakter',
        'content.required' => 'Isi artikel harus diisi',
        'content.min' => 'Isi artikel minimal 10 karakter',
    ];

    public function submit()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'category' => $this->category,
            'author' => $this->author,
            'author_phone' => $this->author_phone,
            'content' => $this->content,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->showSuccessAlert = true;
        $this->reset(['title', 'category', 'author', 'author_phone', 'content']);

        // Emit event to clear TinyMCE
        $this->dispatch('refresh-editor');
    }

    public function cancel()
    {
        return redirect()->route('blog');
    }

    public function closeAlert()
    {
        $this->showSuccessAlert = false;
        return redirect()->route('blog');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
