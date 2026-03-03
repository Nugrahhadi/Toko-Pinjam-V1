<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurPartner extends Model
{
    use HasFactory;
    
    // Perhatikan nama tabel di sini harus sesuai dengan migrasi (our_partners)
    protected $fillable = [
        'name',
        'url',
        'logo_path', 
        'position', 
    ];

    /**
     * Scope untuk mengambil maksimal 8 partner yang terurut.
     */
    public function scopeActive($query)
    {
        return $query->orderBy('position')->limit(8);
    }
}