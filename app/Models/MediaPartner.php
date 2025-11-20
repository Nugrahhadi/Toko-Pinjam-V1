<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPartner extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'url',
        'logo_path',
        'position',
    ];

    /**
     * Scope untuk mengambil maksimal 8 media yang terurut berdasarkan posisi.
     */
    public function scopeActive($query)
    {
        return $query->orderBy('position')->limit(8);
    }
}