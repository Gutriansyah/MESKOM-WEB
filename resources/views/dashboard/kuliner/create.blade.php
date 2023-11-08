@extends('layout.dashboard')

@section('tittle', $tittle)

@section('content')

    <div class="container">
        <h2>
            Halaman {{ $tittle }}
        </h2>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <a href="#" class="alert-link">{{ session('status') }}</a>.
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ route('store-kuliner') }}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="nama_kuliner">Nama Kuliner</label>
                        <input class="form-control" name="nama_kuliner" id="nama_kuliner">
                        <p class="help-block">*Nama makanan atau minuman</p>
                        @error('nama_kuliner')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input class="form-control" name="harga" id="harga">
                        <p class="help-block">*Harga makanan per pcs/pack</p>
                        @error('harga')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input class="form-control" name="deskripsi" id="deskripsi" type="hidden">
                        <trix-editor input="deskripsi"></trix-editor>
                        <p class="help-block">*Deskripsi makanan dan minuman</p>
                        @error('deskripsi')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id" aria-placeholder="Pilih Kategori">
                            <option value="yes">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                        <p class="help-block">*Kategori makanan atau minuman</p>
                        @error('kategori_id')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                The kategori id field required.
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" id="gambar" name="gambar">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @error('gambar')
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="pembatas"></div>
                    <button type="submit" class="btn btn-primary" id="kirim">simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
