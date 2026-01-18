<?php

namespace App\Models;

use App\Models\Harga;
use App\Models\Tanah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daerah extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama_daerah",
        "tanah_id"
    ];
    
   public function Tanah(): BelongsTo
   {
   return $this->belongsTo(Tanah::class);
   }

   public function harga(): HasMany
   {
   return $this->hasMany(Harga::class);
   }
}
