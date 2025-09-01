<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationTestimonial extends Model
{
    protected $fillable = [
        "user_id",
        "message",
        "approved",
        "position",
        "display_name",
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getDisplayLabelAttribute(): string
    {
        return $this->display_name ?:
            $this->user->full_name ?? ($this->user->name ?? "Anonim");
    }
}
