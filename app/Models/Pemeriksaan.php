<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'keluhan', 'diagnosa', 'obat_id'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Pemeriksaan.php
    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'resep')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }



}
