<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $fillable = ['nama_destinasi', 'deskripsi', 'harga'];
    
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
