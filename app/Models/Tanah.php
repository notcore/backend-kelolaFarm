<?php

namespace App\Models;

use App\Models\Tanaman;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Daerah;

class Tanah extends Model
{
     use HasFactory; 
     
    protected $fillable = [
        "jenis_tanah"
    ];

    public function tanaman() : HasMany
    {
        return $this->hasMany(Tanaman::class);

    }

    //import hasMany and model
    public function Daerah(): HasMany
    {
    return $this->hasMany(Daerah::class);
    }

}
