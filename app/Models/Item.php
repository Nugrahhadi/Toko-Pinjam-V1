<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'donation_price',
        'price_unit',
        'stock',
        'available_stock',
        'images',
        'condition',
        'usage_instructions',
        'is_featured',
        'is_active',
        'category_id',
        'location_id',
    ];

    protected $casts = [
        'donation_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'images' => 'array',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->name);
            }
            if (is_null($item->available_stock)) {
                $item->available_stock = $item->stock;
            }
        });

        static::updating(function ($item) {
            if ($item->isDirty('name') && empty($item->slug)) {
                $item->slug = Str::slug($item->name);
            }
        });
    }

    /**
     * Get the category that owns the item
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the location that owns the item
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the bookings for the item
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get active bookings for the item
     */
    public function activeBookings()
    {
        return $this->hasMany(Booking::class)->whereIn('status', ['confirmed', 'active']);
    }

    /**
     * Scope to get only active items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get only featured items
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to get available items
     */
    public function scopeAvailable($query)
    {
        return $query->where('available_stock', '>', 0);
    }

    /**
     * Get the first image
     */
    public function getFirstImageAttribute()
    {
        return $this->images && count($this->images) > 0 ? $this->images[0] : null;
    }

    /**
     * Check if item is available
     */
    public function isAvailable()
    {
        return $this->available_stock > 0 && $this->is_active;
    }

    /**
     * Reduce available stock
     */
    public function reduceStock($quantity = 1)
    {
        $this->available_stock = max(0, $this->available_stock - $quantity);
        $this->save();
    }

    /**
     * Increase available stock
     */
    public function increaseStock($quantity = 1)
    {
        $this->available_stock = min($this->stock, $this->available_stock + $quantity);
        $this->save();
    }
}
