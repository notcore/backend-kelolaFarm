<?php

namespace App\Models;

use App\Models\User;
use App\Models\Daerah;
use App\Models\Tanaman;
use App\Models\Tanah;     
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lahan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tanah_id',
        'daerah_id',
        'nama_lahan',
        'hektar',
    ];

    public function tanah(): BelongsTo
    {
        return $this->belongsTo(Tanah::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function daerah(): BelongsTo
    {
        return $this->belongsTo(Daerah::class);
    }

    public function tanaman(): BelongsToMany
    {
        return $this->belongsToMany(Tanaman::class)
            ->withPivot('jumlah')
            ->withTimestamps();
    }
}
