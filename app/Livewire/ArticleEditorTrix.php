<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Services\ImageService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleEditorTrix extends Component
{
    use WithFileUploads;

    public $title = '';
    public $category = '';
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
        'content' => 'required|min:10',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
    ];

    protected $messages = [
        'title.required' => 'Judul harus diisi',
        'title.min' => 'Judul minimal 3 karakter',
        'category.required' => 'Kategori harus dipilih',
        'content.required' => 'Isi artikel harus diisi',
        'content.min' => 'Isi artikel minimal 10 karakter',
        'featured_image.image' => 'File harus berupa gambar',
        'featured_image.mimes' => 'Format gambar yang didukung: JPEG, PNG, JPG, GIF, WEBP',
        'featured_image.max' => 'Ukuran file maksimal 5MB',
    ];

    public function mount()
    {
        // Extra safety: redirect jika belum login
        if (!Auth::check()) {
            return redirect()->route('login.custom');
        }
    }

    public function submit()
    {
        $this->validate();

        try {
            $featuredImagePath = null;

            if ($this->featured_image) {
                $featuredImagePath = $this->imageService->uploadFeaturedImage($this->featured_image);
            }

            $slug = Str::slug($this->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Post::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Artikel otomatis masuk sebagai draft
            Post::create([
                'title' => $this->title,
                'slug' => $slug,
                'category' => $this->category,
                'author' => Auth::user()->name,
                'author_phone' => Auth::user()->phone ?? '',
                'author_email' => Auth::user()->email,
                'content' => $this->content,
                'featured_image' => $featuredImagePath,
                'status' => 'draft', // Otomatis jadi draft untuk review admin
                'published_at' => null,
                'user_id' => Auth::id(),
            ]);

            // Reset form
            $this->reset(['title', 'category', 'content', 'featured_image']);

            // Dispatch event untuk JavaScript
            $this->dispatch('article-saved', [
                'message' => 'Artikel berhasil disimpan sebagai draft dan menunggu persetujuan admin!'
            ]);
        } catch (\Exception $e) {
            // Dispatch error event
            $this->dispatch('article-error', [
                'message' => 'Terjadi kesalahan saat menyimpan artikel: ' . $e->getMessage()
            ]);
        }
    }

    public function closeAlert()
    {
        $this->showSuccessAlert = false;
        return redirect()->route('blog');
    }

    public function render()
    {
        return view('livewire.article-editor-trix');
    }
}
