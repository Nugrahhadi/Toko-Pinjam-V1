<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        "name",
        "name_en",
        "slug",
        "description",
        "description_en",
        "original_price",
        "donation_price",
        "completeness",
        "how_to_use",
        "how_to_borrow", // NEW
        "stock",
        "images",
        "category_id",
        "location_id",
        "weight",
        "is_active",
    ];

    protected $casts = [
        "images" => "array",
        "is_active" => "boolean",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function rentals()
    {
        return $this->hasMany(\App\Models\Rental::class);
    }

    public function bookedRanges(): array
    {
        $today = now()->toDateString();

        return $this->rentals()
            ->active() // pakai scope dari Rental
            ->whereDate("end_date", ">=", $today) // hanya yang masih relevan
            ->get(["start_date", "end_date"])
            ->map(
                fn($r) => [
                    "from" => $r->start_date->toDateString(),
                    "to" => $r->end_date->toDateString(),
                ],
            )
            ->values()
            ->all();
    }

    protected static function booted()
    {
        static::creating(function (Item $item) {
            // Ambil next running number secara aman via tabel counters
            $next = DB::transaction(function () {
                $row = DB::table("counters")
                    ->where("name", "item_id")
                    ->lockForUpdate()
                    ->first();

                if (!$row) {
                    DB::table("counters")->insert([
                        "name" => "item_id",
                        "value" => 0,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                    $row = (object) ["value" => 0];
                }

                $newVal = $row->value + 1;
                DB::table("counters")
                    ->where("name", "item_id")
                    ->update([
                        "value" => $newVal,
                        "updated_at" => now(),
                    ]);

                return $newVal;
            });

            // ambil bulan & tahun dari created_at (atau default ke now)
            $date = $item->created_at ?? now();

            // format id: {running_number}-{mY}
            $item->id = $next . "-" . $date->format("mY");
        });
    }

    /**
     * Localized name accessor.
     */
    public function getNameAttribute($value)
    {
        if (app()->getLocale() === 'en' && isset($this->attributes['name_en']) && !empty($this->attributes['name_en'])) {
            return $this->attributes['name_en'];
        }
        return $value;
    }

    /**
     * Localized description accessor.
     */
    public function getDescriptionAttribute($value)
    {
        if (app()->getLocale() === 'en' && isset($this->attributes['description_en']) && !empty($this->attributes['description_en'])) {
            return $this->attributes['description_en'];
        }
        return $value;
    }
}
