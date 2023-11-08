<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penginapan',
        'alamat',
        'lokasi',
        'deskripsi',
        'tarif',
        'kontak',
        'gambar_1',
        'gambar_2',
        'gambar_3',
    ];
}
