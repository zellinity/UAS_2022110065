<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksesori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_aksesoris',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function playstation()
    {
        return $this->belongsTo(Playstation::class);
    }
}
