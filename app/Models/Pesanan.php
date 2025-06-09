<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

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
        'kode_booking',
        'bukti_pembayaran'
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'harga_tiket' => 'decimal:2',
        'total_bayar' => 'decimal:2'
    ];

    public function getBuktiPembayaranUrlAttribute()
    {
        return $this->bukti_pembayaran ? asset('storage/' . $this->bukti_pembayaran) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }
}
