<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = ['nama_obat', 'satuan'];

    public function pemeriksaans()
    {
        return $this->belongsToMany(Pemeriksaan::class, 'resep', 'obat_id', 'pemeriksaan_id')
                    ->using(Resep::class)
                    ->withTimestamps();
    }




}
