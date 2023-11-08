<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kuliner',
        'kategori_id',
        'deskripsi',
        'gambar',
        'harga',
    ];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
