<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'user_id',
        'destinasi_id',
        'nama_lengkap',
        'no_identitas',
        'no_hp',
        'tanggal_kunjungan',
        'jumlah_tiket',
        'harga_tiket',
        'total_bayar',
        'status',
        'kode_booking'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class, 'destinasi_id');
    }
}
