<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Services\ImageService;
use Illuminate\Support\Str;

class ArticleEditor extends Component
{
    use WithFileUploads;

    public $title = '';
    public $category = '';
    public $author = '';
    public $author_phone = '';
    public $author_email = '';
    public $content = '';
    public $featured_image;
    public $showSuccessAlert = false;

    protected $imageService;

    public function boot(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    protected $rules = [
        'title' => 'required|min:3',
        'category' => 'required',
        'author' => 'required|min:2',
        'author_email' => 'nullable|email',
        'content' => 'required|min:10',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
    ];

    protected $messages = [
        'title.required' => 'Judul harus diisi',
        'title.min' => 'Judul minimal 3 karakter',
        'category.required' => 'Kategori harus dipilih',
        'author.required' => 'Nama penulis harus diisi',
        'author.min' => 'Nama penulis minimal 2 karakter',
        'author_email.email' => 'Format email tidak valid',
        'content.required' => 'Isi artikel harus diisi',
        'content.min' => 'Isi artikel minimal 10 karakter',
        'featured_image.image' => 'File harus berupa gambar',
        'featured_image.mimes' => 'Format gambar yang didukung: JPEG, PNG, JPG, GIF, WEBP',
        'featured_image.max' => 'Ukuran file maksimal 5MB',
    ];

    public function submit()
    {
        $this->validate();

        $featuredImagePath = null;

        // Upload featured image if provided
        if ($this->featured_image) {
            $featuredImagePath = $this->imageService->uploadFeaturedImage($this->featured_image);
        }

        // Generate slug from title
        $slug = Str::slug($this->title);
        $originalSlug = $slug;
        $counter = 1;

        // Ensure unique slug
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Post::create([
            'title' => $this->title,
            'slug' => $slug,
            'category' => $this->category,
            'author' => $this->author,
            'author_phone' => $this->author_phone,
            'author_email' => $this->author_email,
            'content' => $this->content,
            'featured_image' => $featuredImagePath,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->showSuccessAlert = true;
        $this->reset(['title', 'category', 'author', 'author_phone', 'author_email', 'content', 'featured_image']);

        // Emit event to clear editor
        $this->dispatch('refresh-editor');
    }

    public function removeFeaturedImage()
    {
        $this->featured_image = null;
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
        return view('livewire.article-editor');
    }
}
