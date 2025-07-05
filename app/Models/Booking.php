<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'user_id',
        'item_id',
        'quantity',
        'start_date',
        'end_date',
        'total_days',
        'total_donation',
        'status',
        'notes',
        'confirmed_at',
        'picked_up_at',
        'returned_at',
        'pickup_photos',
        'return_photos',
        'pickup_notes',
        'return_notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_donation' => 'decimal:2',
        'confirmed_at' => 'datetime',
        'picked_up_at' => 'datetime',
        'returned_at' => 'datetime',
        'pickup_photos' => 'array',
        'return_photos' => 'array',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            if (empty($booking->booking_code)) {
                $booking->booking_code = 'BOOK-' . strtoupper(uniqid());
            }

            if ($booking->start_date && $booking->end_date) {
                $booking->total_days = Carbon::parse($booking->start_date)
                    ->diffInDays(Carbon::parse($booking->end_date)) + 1;
            }
        });
    }

    /**
     * Get the user that owns the booking
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the item that is booked
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Scope for pending bookings
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for confirmed bookings
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope for active bookings
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for completed bookings
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Check if booking is overdue
     */
    public function isOverdue()
    {
        return $this->end_date < now() && in_array($this->status, ['confirmed', 'active']);
    }

    /**
     * Confirm the booking
     */
    public function confirm()
    {
        $this->status = 'confirmed';
        $this->confirmed_at = now();
        $this->save();

        // Reduce item stock
        $this->item->reduceStock($this->quantity);
    }

    /**
     * Cancel the booking
     */
    public function cancel()
    {
        if (in_array($this->status, ['confirmed', 'pending'])) {
            $this->status = 'cancelled';
            $this->save();

            // Restore item stock if it was confirmed
            if ($this->confirmed_at) {
                $this->item->increaseStock($this->quantity);
            }
        }
    }

    /**
     * Mark as picked up
     */
    public function markAsPickedUp()
    {
        $this->status = 'active';
        $this->picked_up_at = now();
        $this->save();
    }

    /**
     * Mark as returned
     */
    public function markAsReturned()
    {
        $this->status = 'completed';
        $this->returned_at = now();
        $this->save();

        // Restore item stock
        $this->item->increaseStock($this->quantity);
    }
}
