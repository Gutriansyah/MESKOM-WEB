<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wisata',
        'alamat',
        'lokasi',
        'deskripsi',
        'gambar_1',
        'gambar_2',
        'gambar_3',
    ];

    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }
}
