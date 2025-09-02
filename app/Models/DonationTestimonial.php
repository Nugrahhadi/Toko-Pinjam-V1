<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationTestimonial extends Model
{
    protected $fillable = [
        "user_id",
        "display_name", // ← pakai untuk override nama tampil
        "message",
        "approved",
        "position",
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
