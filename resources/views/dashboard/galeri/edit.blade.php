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
                <form action="{{ route('update-galeri', $data->id) }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="wisata_id">Tempat Wisata</label>
                        <select class="form-control" id="wisata_id" name="wisata_id" aria-placeholder="Pilih Kategori">
                            <option value="{{ $data->wisata->id }}">{{ $data->wisata->nama_wisata }}</option>
                            @foreach ($wisatas as $wisata)
                                <option value="{{ $wisata->id }}">{{ $wisata->nama_wisata }}</option>
                            @endforeach
                        </select>
                        <p class="help-block">*Pilih tempat wisata</p>
                        @error('wisata_id')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                The tempat wisata field required.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Gambar</label>
                        <input class="form-control" name="nama" id="nama" value="{{ $data->nama }}">
                        <p class="help-block">*Nama Gambar atau foto tempat wisata</p>
                        @error('nama')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Nama gambar field is required
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div>
                                    <img src="{{ asset('storage/' . $data->gambar) }}" alt="" style="height: 240px">
                                </div>
                                <br>
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
