<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationAllocation extends Model
{
    protected $fillable = [
        'item_procurement',
        'website_operations',
        'creative_work',
        'digital_subscriptions',
        'others',
    ];

    /**
     * Get dynamic total allocation value.
     */
    public function getTotalAttribute(): int
    {
        return $this->item_procurement
            + $this->website_operations
            + $this->creative_work
            + $this->digital_subscriptions
            + $this->others;
    }
}
