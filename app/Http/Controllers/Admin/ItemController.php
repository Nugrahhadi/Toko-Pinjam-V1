<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Hapus item dan semua file terkait
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        
        // Hapus gambar dari storage jika ada
        if ($item->image_path) {
            // Hapus file gambar utama
            if (Storage::disk('public')->exists($item->image_path)) {
                Storage::disk('public')->delete($item->image_path);
            }
        }
        
        // Hapus gallery images jika ada
        if ($item->gallery_images) {
            $galleryImages = json_decode($item->gallery_images, true);
            if (is_array($galleryImages)) {
                foreach ($galleryImages as $imagePath) {
                    if (Storage::disk('public')->exists($imagePath)) {
                        Storage::disk('public')->delete($imagePath);
                    }
                }
            }
        }
        
        // Simpan nama item untuk pesan sukses
        $itemName = $item->name;
        
        // Hapus item dari database
        $item->delete();
        
        // Redirect dengan pesan sukses
        return redirect()
            ->route('admin.items')
            ->with('success', "Barang '{$itemName}' berhasil dihapus beserta semua file gambarnya.");
    }
    
    /**
     * Soft delete item (jika ingin menggunakan soft delete)
     */
    public function softDelete($id)
    {
        $item = Item::findOrFail($id);
        $itemName = $item->name;
        
        // Soft delete (jika model menggunakan SoftDeletes trait)
        $item->delete();
        
        return redirect()
            ->route('admin.items')
            ->with('success', "Barang '{$itemName}' berhasil diarsipkan.");
    }
    
    /**
     * Restore soft deleted item
     */
    public function restore($id)
    {
        $item = Item::withTrashed()->findOrFail($id);
        $itemName = $item->name;
        
        $item->restore();
        
        return redirect()
            ->route('admin.items')
            ->with('success', "Barang '{$itemName}' berhasil dipulihkan.");
    }
}
