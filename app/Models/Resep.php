<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Resep extends Pivot
{
    protected $table = 'resep';

    protected $fillable = [
        'pemeriksaan_id',
        'obat_id',
    ];

    public $timestamps = true;
}
