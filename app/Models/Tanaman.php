<?php

namespace App\Models;


use App\Models\Harga;
use App\Models\Lahan;
use App\Models\Tanah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tanaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tanaman',
        "tanah_id",
    ];

    public function Tanah() : BelongsTo
    {
        return $this->belongsTo(Tanah::class);
    }

       public function lahan(): BelongsToMany
    {
        return $this->belongsToMany(Lahan::class)
            ->withPivot('jumlah')
            ->withTimestamps();
    }

    //import hasMany and model
    public function harga(): HasMany
    {
    return $this->hasMany(Harga::class);
    }
}
