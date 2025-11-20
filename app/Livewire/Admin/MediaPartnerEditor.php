<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\MediaPartner;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

#[Title('Kelola Partner Media')]
class MediaPartnerEditor extends Component
{
    use WithFileUploads;

    public $partners;
    
    // Properti untuk Modal & Form Tambah Baru
    public $showAddModal = false;
    public $newMedia = ['name' => '', 'url' => '', 'logo' => null]; 

    // Properti untuk Modal Edit
    public $partnerToEditId = null;
    public $partnerToEdit = [];
    public $logoUpload = null; 
    
    // Aturan validasi
    protected $rules = [
        'newMedia.name' => 'required|string|max:255',
        'newMedia.url' => 'nullable|url|max:255',
        'newMedia.logo' => 'required|image|max:1024|mimes:jpeg,png,jpg,gif,svg',
    ];

    protected $editRules = [
        'partnerToEdit.name' => 'required|string|max:255',
        'partnerToEdit.url' => 'nullable|url|max:255',
        'logoUpload' => 'nullable|image|max:1024|mimes:jpeg,png,jpg,gif,svg',
    ];

    public function mount()
    {
        $this->loadPartners();
    }
    
    protected function loadPartners()
    {
        $this->partners = MediaPartner::orderBy('position')->get();
    }

    public function render()
    {
        return view('livewire.admin.media-partner-editor')
            ->extends('layouts.admin')
            ->section('content');
    }

    /** MENAMBAHKAN PARTNER BARU */
    public function addPartner()
    {
        $this->validate();
        
        // Simpan file ke 'storage/app/public/media-logos'.
        // $relativePath akan berisi 'media-logos/nama_file.jpg'
        $relativePath = $this->newMedia['logo']->store('media-logos', 'public');
        
        MediaPartner::create([
            'name' => $this->newMedia['name'],
            'url' => $this->newMedia['url'] ?? '#',
            'logo_path' => $relativePath, // SIMPAN PATH RELATIF SAJA
            'position' => MediaPartner::max('position') + 1,
        ]);

        $this->reset('newMedia', 'showAddModal');
        $this->loadPartners();
        session()->flash('message', 'Partner media berhasil ditambahkan.');
    }
    
    public function editPartner($partnerId)
    {
        $partner = $this->partners->firstWhere('id', $partnerId);
        if (!$partner) return;

        $this->partnerToEditId = $partnerId;
        $this->partnerToEdit = $partner->toArray();
        $this->reset('logoUpload'); 
    }

    /** MEMPERBARUI PARTNER */
    public function updatePartner()
    {
        $this->validate($this->editRules);

        $partner = MediaPartner::find($this->partnerToEditId);

        if ($this->logoUpload) {
            // Hapus file lama dari storage (optional, tapi disarankan)
            if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
                 Storage::disk('public')->delete($partner->logo_path);
            }

            // Simpan file baru, dapatkan path relatif
            $relativePath = $this->logoUpload->store('media-logos', 'public');
            $partner->logo_path = $relativePath;
        }

        $partner->name = $this->partnerToEdit['name'];
        $partner->url = $this->partnerToEdit['url'] ?? '#';
        $partner->save();

        $this->reset('partnerToEditId', 'partnerToEdit', 'logoUpload');
        $this->loadPartners();
        session()->flash('message', 'Partner media berhasil diperbarui.');
    }
    
    public function removePartner($partnerId)
    {
        $partner = MediaPartner::find($partnerId);
        if (!$partner) return;

        // Hapus file dari storage sebelum menghapus record
        if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
             Storage::disk('public')->delete($partner->logo_path);
        }

        $partner->delete();
        $this->loadPartners();
        session()->flash('message', 'Partner media berhasil dihapus.');
    }
    
    public function reorder($items)
    {
        foreach ($items as $item) {
            MediaPartner::find($item['value'])->update(['position' => $item['order']]);
        }
        $this->loadPartners();
        session()->flash('message', 'Urutan partner berhasil diperbarui.');
    }
}