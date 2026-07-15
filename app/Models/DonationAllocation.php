<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationAllocation extends Model
{
    protected $fillable = [
        'operational',
        'buy_goods',
        'event',
        'promotion',
        'maintenance',
        'others',
    ];

    /**
     * Get dynamic total allocation value.
     */
    public function getTotalAttribute(): int
    {
        return $this->operational
            + $this->buy_goods
            + $this->event
            + $this->promotion
            + $this->maintenance
            + $this->others;
    }
}
