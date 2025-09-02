<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationLeaderboard extends Model
{
    protected $fillable = [
        "user_id",
        "display_name", // ← pakai untuk override nama tampil
        "amount",
        "position",
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
