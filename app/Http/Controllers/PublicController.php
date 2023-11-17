<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kuliner;
use App\Models\Penginapan;
use App\Models\Wisata;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('home', [
            "tittle" => "Halaman Home",
            "wisatas" => Wisata::all(),
            "penginapans" => Penginapan::all(),
            "kuliners" => Kuliner::all(),
            "beritas" => Berita::all(),
        ]);
    }

    public function wisata()
    {
        return view('home.wisata.index', [
            "tittle" => 'Halaman Wisata',
            "datas" => Wisata::all()
        ]);
    }
    public function penginapan()
    {
        return view('home.penginapan.index', [
            "tittle" => 'Halaman Penginapan',
            "datas" => Penginapan::all()
        ]);
    }
    public function kuliner()
    {
        return view('home.kuliner.index', [
            "tittle" => 'Halaman Kuliner',
            "datas" => Kuliner::all()
        ]);
    }
    public function berita()
    {
        return view('home.berita.index', [
            "tittle" => 'Halaman Berita',
            "datas" => Berita::all()
        ]);
    }
    public function galeri()
    {
        return view('home.galeri.index', [
            "tittle" => 'Halaman Galeri',
            "datas" => Wisata::all()
        ]);
    }
}
