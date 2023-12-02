<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KulinerController extends Controller
{
    public function index(Request $request)
    {

        if ($request->search) {
            $kuliner = Kuliner::where('nama_kuliner', 'like', "%$request->search%")
                ->latest()
                ->get();
        } else {
            $kuliner = Kuliner::latest()->get();
        }

        return view('dashboard.kuliner.index', [
            "tittle" => "Dashboard Kuliner",
            "data" => $kuliner
        ]);
    }

    public function create()
    {
        return view('dashboard.kuliner.create', [
            "tittle" => "Tambah Kuliner",
            "kategoris" => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kuliner' => 'required',
            'harga' => 'required',
            'deskripsi' => 'nullable',
            'kategori_id' => 'required',
            'gambar' => 'image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('kuliners'); // Get the original file name
        } else {
            $gambar = null;
        }

        $kuliner = Kuliner::create([
            'kategori_id' => $request->kategori_id,
            'nama_kuliner' => $request->nama_kuliner,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' =>  $gambar
        ]);

        return back()->with('status', 'Data berhasil ditambah');
    }

    public function edit(Kuliner $kuliner)
    {
        return view('dashboard.kuliner.edit', [
            "tittle" => "Edit kuliner",
            "data" => $kuliner,
            "kategoris" => Kategori::all()
        ]);
    }

    public function update(Request $request, Kuliner $kuliner)
    {
        $request->validate([
            'nama_kuliner' => 'required',
            'harga' => 'required',
            'deskripsi' => 'nullable',
            'kategori_id' => 'required',
            'gambar' => 'image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('kuliners');
            if ($kuliner->gambar != null) {
                Storage::delete($kuliner->gambar);
            }
        } else {
            $gambar = $kuliner->gambar;
        }

        $kuliner->update([
            'kategori_id' => $request->kategori_id,
            'nama_kuliner' => $request->nama_kuliner,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' =>  $gambar
        ]);

        return back()->with('status', 'Data berhasil dirubah');
    }

    public function destroy(Kuliner $kuliner)
    {
        if ($kuliner->gambar != null) {
            Storage::delete($kuliner->gambar);
        }
        $kuliner->deleteOrFail();
        return back()->with('status', 'Data berhasil dihapus');
    }
}
