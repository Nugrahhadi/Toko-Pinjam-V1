<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'original_price',
        'donation_price',
        'stock',
        'images',
        'category_id',
        'location_id',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function category() { return $this->belongsTo(Category::class); }
    public function location() { return $this->belongsTo(Location::class); }
    public function rentals(){ return $this->hasMany(\App\Models\Rental::class); }
}
