<?php

namespace App\Models;

use App\Models\Daerah;
use App\Models\Tanaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Harga extends Model
{
    use HasFactory;

    protected $fillable = [
        'daerah_id',
        'tanaman_id',
        'harga'
    ];

    public function tanaman(): BelongsTo
    {
        return $this->belongsTo(Tanaman::class);
    }

    public function daerah(): BelongsTo
    {
        return $this->belongsTo(Daerah::class);
    }
}
