<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'playstation_id',
        'kurir_id',
        'tanggal_sewa',
        'tanggal_kembali',
        'total_harga',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function playstation()
    {
        return $this->belongsTo(Playstation::class);
    }

    public function kurir()
    {
        return $this->belongsTo(Kurir::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
