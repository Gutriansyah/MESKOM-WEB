<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            // $query = Berita::query();

            $berita = Berita::where('judul', 'like', "%$request->search%")
                ->orWhere('penulis', 'like', "%$request->search%")->latest()
                ->paginate(10);
        } else {
            $berita = Berita::latest()->paginate(10);
        }

        return view('dashboard.berita.index', [
            "tittle" => "Dashboard Berita",
            "data" => $berita
        ]);
    }


    public function create()
    {
        return view('dashboard.berita.create', [
            "tittle" => "Tambah Berita"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'topik' => 'required',
            'penulis' => 'required',
            'konten' => 'nullable',
            'tanggal_publikasi' => 'required',
            'gambar' => 'image|required|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('beritas'); // Get the original file name
        } else {
            $gambar = null;
        }

        $berita = Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'topik' => $request->topik,
            'penulis' => $request->penulis,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'gambar' =>  $gambar
        ]);

        return back()->with('status', 'Data berhasil ditambah');
    }

    public function edit(Berita $berita)
    {
        return view('dashboard.berita.edit', [
            "tittle" => "Edit Berita",
            "data" => $berita
        ]);
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required',
            'topik' => 'required',
            'penulis' => 'required',
            'konten' => 'nullable',
            'tanggal_publikasi' => 'required',
            'gambar' => 'image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('beritas');
            if ($berita->gambar != null) {
                Storage::delete($berita->gambar);
            }
        } else {
            $gambar = $berita->gambar;
        }

        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'topik' => $request->topik,
            'penulis' => $request->penulis,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'gambar' =>  $gambar
        ]);

        return back()->with('status', 'Data berhasil dirubah');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar != null) {
            Storage::delete($berita->gambar);
        }
        $berita->deleteOrFail();
        return back()->with('status', 'Data berhasil dihapus');
    }
}
