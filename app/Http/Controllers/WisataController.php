<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kuliner;
use App\Models\Penginapan;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{

    public function dashboard()
    {
        return view('dashboard.wisata.first', [
            "tittle" => "Dashboard",
            "wisata" => Wisata::count(),
            "kuliner" => Kuliner::count(),
            "penginapan" => Penginapan::count(),
            "berita" => Berita::count(),
        ]);
    }

    public function index()
    {
        return view('dashboard.wisata.index', [
            "tittle" => "Dashboard Wisata",
            "data" => Wisata::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.wisata.create', [
            "tittle" => "Tambah Wisata"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'nullable',
            'lokasi' => 'url:http,https|nullable',
            'gambar_1' => 'image|max:2048',
            'gambar_2' => 'image|max:2048',
            'gambar_3' => 'image|max:2048'
        ]);

        if ($request->hasFile('gambar_1')) {
            $gambar1 = $request->file('gambar_1')->store('wisatas'); // Get the original file name
        } else {
            $gambar1 = null;
        }

        if ($request->hasFile('gambar_2')) {
            $gambar2 = $request->file('gambar_2')->store('wisatas'); // Get the original file name
        } else {
            $gambar2 = null;
        }

        if ($request->hasFile('gambar_3')) {
            $gambar3 = $request->file('gambar_3')->store('wisatas'); // Get the original file name
        } else {
            $gambar3 = null;
        }

        $wisata = Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar_1' => $gambar1,
            'gambar_2' =>  $gambar2,
            'gambar_3' =>  $gambar3
        ]);

        return back()->with('status', 'Data Berhasil ditambah');
    }

    public function edit(Wisata $wisata)
    {
        return view('dashboard.wisata.edit', [
            "tittle" => "Edit Wisata",
            "data" => $wisata,
        ]);
    }

    public function update(Request $request, Wisata $wisata)
    {

        $request->validate([
            'nama_wisata' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'nullable',
            'lokasi' => 'url:http,https|nullable',
            'gambar_1' => 'image|max:2048',
            'gambar_2' => 'image|max:2048',
            'gambar_3' => 'image|max:2048'
        ]);

        if ($request->hasFile('gambar_1')) {
            $gambar1 = $request->file('gambar_1')->store('wisatas');
            if ($wisata->gambar_1 != null) {
                Storage::delete($wisata->gambar_1);
            }
        } else {
            $gambar1 = $wisata->gambar_1;
        }

        if ($request->hasFile('gambar_2')) {
            $gambar2 = $request->file('gambar_2')->store('wisatas');
            if ($wisata->gambar_2 != null) {
                Storage::delete($wisata->gambar_2);
            }
        } else {
            $gambar2 = $wisata->gambar_2;
        }

        if ($request->hasFile('gambar_3')) {
            $gambar3 = $request->file('gambar_3')->store('wisatas');
            if ($wisata->gambar_3 != null) {
                Storage::delete($wisata->gambar_3);
            }
        } else {
            $gambar3 = $wisata->gambar_3;
        }

        $wisata->update([
            'nama_wisata' => $request->nama_wisata,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar_1' => $gambar1,
            'gambar_2' =>  $gambar2,
            'gambar_3' =>  $gambar3
        ]);

        return back()->with('status', 'Data berhasil dirubah');
    }

    public function destroy(Wisata $wisata)
    {
        if ($wisata->gambar_1 != null) {
            Storage::delete($wisata->gambar_1);
        }
        if ($wisata->gambar_2 != null) {
            Storage::delete($wisata->gambar_2);
        }
        if ($wisata->gambar_3 != null) {
            Storage::delete($wisata->gambar_3);
        }
        $wisata->deleteOrFail();
        return back()->with('status', 'Data Berhasil dihapus');
    }
}
