<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'sewa_id',
        'jumlah_bayar',
        'metode_pembayaran',
        'tanggal_pembayaran',
    ];

    public function sewa()
    {
        return $this->belongsTo(Sewa::class);
    }}
