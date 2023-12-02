<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    //

    public function index(Request $request)
    {

        if ($request->search) {
            $searchQuery = $request->input('search');

            $galeri = Galeri::whereHas('wisata', function ($query) use ($searchQuery) {
                $query->where('nama_wisata', 'like', "%$searchQuery%");
            })->get();
        } else {
            $galeri = Galeri::latest()->get();
        }

        return view('dashboard.galeri.index', [
            "tittle" => "Dashboard Galeri",
            "data" => $galeri
        ]);
    }

    public function create()
    {
        return view('dashboard.galeri.create', [
            "tittle" => "Tambah Galeri",
            "wisatas" => Wisata::all()
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'wisata_id' => 'required',
            'gambar' => 'image|max:2048|required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('galeris'); // Get the original file name
        } else {
            $gambar = null;
        }

        $galeri = Galeri::create([
            'nama' => $request->nama,
            'wisata_id' => $request->wisata_id,
            'gambar' =>  $gambar
        ]);

        return back()->with('status', 'Data berhasil ditambah');
    }

    public function edit(Galeri $galeri)
    {
        return view('dashboard.galeri.edit', [
            "data" => $galeri,
            "tittle" => "Edit Galeri",
            "wisatas" => Wisata::all()
        ]);
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'nama' => 'required',
            'wisata_id' => 'required',
            'gambar' => 'image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('galeris');
            if ($galeri->gambar != null) {
                Storage::delete($galeri->gambar);
            }
        } else {
            $gambar = $galeri->gambar;
        }

        $galeri->update([
            'nama' => $request->nama,
            'wisata_id' => $request->wisata_id,
            'gambar' =>  $gambar
        ]);

        return back()->with('status', 'Data berhasil dirubah');
    }

    public function delete(Galeri $galeri)
    {
        if ($galeri->gambar != null) {
            Storage::delete($galeri->gambar);
        }
        $galeri->deleteOrFail();
        return back()->with('status', 'Data berhasil dihapus');
    }
}
