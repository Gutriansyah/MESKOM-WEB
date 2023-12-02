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

    public function wisata(Request $request)
    {
        if ($request->search) {
            $wisata = Wisata::where('nama_wisata', 'like', "%$request->search%")
                ->latest()
                ->get();
        } else {
            $wisata = Wisata::latest()->get();
        }

        return view('home.wisata.index', [
            "tittle" => 'Halaman Wisata',
            "datas" => $wisata
        ]);
    }

    public function DetailWisata(Wisata $wisata)
    {
        return view('home.wisata.detail', [
            "tittle" => "Detail Wisata",
            "wisata" => $wisata
        ]);
    }

    public function penginapan(Request $request)
    {
        if ($request->search) {
            $penginapan = Penginapan::where('nama_penginapan', 'like', "%$request->search%")
                ->latest()
                ->get();
        } else {
            $penginapan = Penginapan::latest()->get();
        }

        return view('home.penginapan.index', [
            "tittle" => 'Halaman Penginapan',
            "datas" => $penginapan
        ]);
    }

    public function DetailPenginapan(Penginapan $penginapan)
    {
        return view('home.penginapan.detail', [
            "tittle" => "Detail penginapan",
            "penginapan" => $penginapan
        ]);
    }

    public function kuliner(Request $request)
    {
        if ($request->search) {
            $kuliner = Kuliner::where('nama_kuliner', 'like', "%$request->search%")
                ->latest()
                ->get();
        } else {
            $kuliner = Kuliner::latest()->get();
        }

        return view('home.kuliner.index', [
            "tittle" => 'Halaman Kuliner',
            "datas" => $kuliner
        ]);
    }
    public function DetailKuliner(Kuliner $kuliner)
    {
        return view('home.kuliner.detail', [
            "tittle" => 'Detail Kuliner',
            "kuliner" => $kuliner
        ]);
    }
    public function berita(Request $request)
    {
        if ($request->search) {
            $berita = Berita::where('judul', 'like', "%$request->search%")
                ->orWhere('penulis', 'like', "%$request->search%")->latest()
                ->paginate(14);
        } else {
            $berita = Berita::latest()->paginate(14);
        }

        return view('home.berita.index', [
            "tittle" => 'Halaman Berita',
            "datas" => $berita
        ]);
    }

    public function DetailBerita(Berita $berita)
    {
        return view('home.berita.detail', [
            "tittle" => 'Detail Berita',
            "berita" => $berita
        ]);
    }

    public function galeri()
    {

        return view('home.galeri.index', [
            "tittle" => 'Halaman Galeri',
            "datas" => Wisata::all()
        ]);
    }

    public function DetailGaleri(Wisata $wisata)
    {
        return view('home.galeri.detail', [
            "tittle" => 'Detail Galeri',
            "galeri" => $wisata->galeris,
            "wisata" => $wisata
        ]);
    }
}
