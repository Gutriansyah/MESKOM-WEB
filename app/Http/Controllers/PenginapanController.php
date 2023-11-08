<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenginapanController extends Controller
{
    public function index()
    {
        return view('dashboard.penginapan.index', [
            "tittle" => "Dashboard Penginapan",
            "data" => Penginapan::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.penginapan.create', [
            "tittle" => "Tambah Penginapan"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penginapan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'nullable',
            'lokasi' => 'url:http,https|nullable',
            'tarif' => 'nullable',
            'kontak' => 'required',
            'gambar_1' => 'image|max:2048',
            'gambar_2' => 'image|max:2048',
            'gambar_3' => 'image|max:2048'
        ]);

        if ($request->hasFile('gambar_1')) {
            $gambar1 = $request->file('gambar_1')->store('penginapans'); // Get the original file name
        } else {
            $gambar1 = null;
        }

        if ($request->hasFile('gambar_2')) {
            $gambar2 = $request->file('gambar_2')->store('penginapans'); // Get the original file name
        } else {
            $gambar2 = null;
        }

        if ($request->hasFile('gambar_3')) {
            $gambar3 = $request->file('gambar_3')->store('penginapans'); // Get the original file name
        } else {
            $gambar3 = null;
        }

        $penginap = Penginapan::create([
            'nama_penginapan' => $request->nama_penginapan,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'tarif' => $request->tarif,
            'gambar_1' => $gambar1,
            'gambar_2' =>  $gambar2,
            'gambar_3' =>  $gambar3
        ]);

        return back()->with('status', 'Data berhasil ditambah');
    }

    public function edit(Penginapan $penginapan)
    {
        return view('dashboard.penginapan.edit', [
            "tittle" => "Edit Penginapan",
            "data" => $penginapan
        ]);
    }

    public function update(Request $request, Penginapan $penginapan)
    {
        $request->validate([
            'nama_penginapan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'nullable',
            'lokasi' => 'url:http,https|nullable',
            'tarif' => 'nullable',
            'kontak' => 'required',
            'gambar_1' => 'image|max:2048',
            'gambar_2' => 'image|max:2048',
            'gambar_3' => 'image|max:2048'
        ]);

        if ($request->hasFile('gambar_1')) {
            $gambar1 = $request->file('gambar_1')->store('penginapans');
            if ($penginapan->gambar_1 != null) {
                Storage::delete($penginapan->gambar_1);
            }
        } else {
            $gambar1 = $penginapan->gambar_1;
        }

        if ($request->hasFile('gambar_2')) {
            $gambar2 = $request->file('gambar_2')->store('penginapans');
            if ($penginapan->gambar_2 != null) {
                Storage::delete($penginapan->gambar_2);
            }
        } else {
            $gambar2 = $penginapan->gambar_2;
        }

        if ($request->hasFile('gambar_3')) {
            $gambar3 = $request->file('gambar_3')->store('penginapans');
            if ($penginapan->gambar_3 != null) {
                Storage::delete($penginapan->gambar_1);
            }
        } else {
            $gambar3 = $penginapan->gambar_3;
        }

        $penginapan->update([
            'nama_penginapan' => $request->nama_penginapan,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'tarif' => $request->tarif,
            'gambar_1' => $gambar1,
            'gambar_2' =>  $gambar2,
            'gambar_3' =>  $gambar3
        ]);

        return back()->with('status', 'Data berhasil dirubah');
    }

    public function destroy(Penginapan $penginapan)
    {
        if ($penginapan->gambar_1 != null) {
            Storage::delete($penginapan->gambar_1);
        }
        if ($penginapan->gambar_2 != null) {
            Storage::delete($penginapan->gambar_2);
        }
        if ($penginapan->gambar_3 != null) {
            Storage::delete($penginapan->gambar_3);
        }
        $penginapan->deleteOrFail();
        return back()->with('status', 'Data berhasil dihapus');
    }
}
