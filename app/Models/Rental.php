<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'item_id','user_id','quantity',
        'start_date','end_date','status',
        'note','returned_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'returned_at'=> 'datetime',
    ];

    public function item(){ return $this->belongsTo(Item::class); }
    public function user(){ return $this->belongsTo(User::class); }
}
