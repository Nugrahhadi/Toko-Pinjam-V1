<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'original_price',
        'donation_price',
        'stock',
        'images',
        'category_id',
        'location_id',
        'weight',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
    ];

    public function category() { return $this->belongsTo(Category::class); }
    public function location() { return $this->belongsTo(Location::class); }
    public function rentals(){ return $this->hasMany(\App\Models\Rental::class); }

    protected static function booted()
    {
        static::creating(function (Item $item) {
            // Ambil next running number secara aman via tabel counters
            $next = DB::transaction(function () {
                $row = DB::table('counters')
                    ->where('name', 'item_id')
                    ->lockForUpdate()
                    ->first();

                if (!$row) {
                    DB::table('counters')->insert([
                        'name' => 'item_id',
                        'value' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $row = (object) ['value' => 0];
                }

                $newVal = $row->value + 1;
                DB::table('counters')
                    ->where('name', 'item_id')
                    ->update([
                        'value' => $newVal,
                        'updated_at' => now(),
                    ]);

                return $newVal;
            });

            // ambil bulan & tahun dari created_at (atau default ke now)
            $date = $item->created_at ?? now();

            // format id: {running_number}-{mY}
            $item->id = $next . '-' . $date->format('mY');
        });
    }
}
