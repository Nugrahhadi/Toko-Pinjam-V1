<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationLeaderboard extends Model
{
    protected $fillable = ["user_id", "amount", "position", "display_name"];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // helper untuk tampilan nama
    public function getDisplayLabelAttribute(): string
    {
        return $this->display_name ?:
            $this->user->full_name ?? ($this->user->name ?? "Anonim");
    }
}
