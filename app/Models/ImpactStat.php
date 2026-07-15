<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImpactStat extends Model
{
    protected $fillable = [
        'saved_money',
        'co2_prevented',
        'waste_prevented',
    ];
}
