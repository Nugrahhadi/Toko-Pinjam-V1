<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\OurPartner; // Menggunakan Model OurPartner
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

#[Title('Kelola Our Partner')]
class OurPartnerEditor extends Component
{
    use WithFileUploads;

    public $partners;
    
    // Properti untuk Modal & Form Tambah Baru
    public $showAddModal = false;
    public $newPartner = ['name' => '', 'url' => '', 'logo' => null]; // Diubah dari newMedia
    
    // Properti untuk Modal Edit
    public $partnerToEditId = null;
    public $partnerToEdit = [];
    public $logoUpload = null; 
    
    // Aturan validasi
    protected $rules = [
        'newPartner.name' => 'required|string|max:255',
        'newPartner.url' => 'nullable|url|max:255',
        'newPartner.logo' => 'required|image|max:1024|mimes:jpeg,png,jpg,gif,svg',
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
        $this->partners = OurPartner::orderBy('position')->get();
    }

    public function render()
    {
        return view('livewire.admin.our-partner-editor')
            ->extends('layouts.admin')
            ->section('content');
    }

    /** MENAMBAHKAN PARTNER BARU */
    public function addPartner()
    {
        $this->validate();
        
        $relativePath = $this->newPartner['logo']->store('partner-logos', 'public');
        
        OurPartner::create([
            'name' => $this->newPartner['name'],
            'url' => $this->newPartner['url'] ?? '#',
            'logo_path' => $relativePath, 
            'position' => OurPartner::max('position') + 1,
        ]);

        $this->reset('newPartner', 'showAddModal');
        $this->loadPartners();
        session()->flash('message', 'Partner baru berhasil ditambahkan.');
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

        $partner = OurPartner::find($this->partnerToEditId);

        if ($this->logoUpload) {
            if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
                 Storage::disk('public')->delete($partner->logo_path);
            }

            $relativePath = $this->logoUpload->store('partner-logos', 'public');
            $partner->logo_path = $relativePath;
        }

        $partner->name = $this->partnerToEdit['name'];
        $partner->url = $this->partnerToEdit['url'] ?? '#';
        $partner->save();

        $this->reset('partnerToEditId', 'partnerToEdit', 'logoUpload');
        $this->loadPartners();
        session()->flash('message', 'Partner berhasil diperbarui.');
    }
    
    public function removePartner($partnerId)
    {
        $partner = OurPartner::find($partnerId);
        if (!$partner) return;

        if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
             Storage::disk('public')->delete($partner->logo_path);
        }

        $partner->delete();
        $this->loadPartners();
        session()->flash('message', 'Partner berhasil dihapus.');
    }
    
    public function reorder($items)
    {
        foreach ($items as $item) {
            OurPartner::find($item['value'])->update(['position' => $item['order']]);
        }
        $this->loadPartners();
        session()->flash('message', 'Urutan partner berhasil diperbarui.');
    }
}