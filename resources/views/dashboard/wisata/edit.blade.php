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
                <form action="{{ route('update-wisata', $data->id) }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input class="form-control" name="nama_wisata" id="nama_wisata" value="{{ $data->nama_wisata }}">
                        <p class="help-block">*Nama tempat wisata</p>
                        @error('nama_wisata')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" name="alamat" id="alamat" value="{{ $data->alamat }}">
                        <p class="help-block">*Alamat Tempat wisata</p>
                        @error('alamat')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input class="form-control" name="lokasi" id="lokasi" value="{{ $data->lokasi }}">
                        <p class="help-block">*Link google maps lokasi wisata</p>
                        @error('lokasi')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input class="form-control" name="deskripsi" id="deskripsi" type="hidden"
                            value="{{ $data->deskripsi }}">
                        <trix-editor input="deskripsi"></trix-editor>
                        <p class="help-block">*Deskripsi Tempat Wisata</p>
                        @error('deskripsi')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div>
                                    <img src="{{ asset('storage/' . $data->gambar_1) }}" alt=""
                                        style="height: 100px">
                                </div>
                                <label for="gambar_1">Gambar 1</label>
                                <input type="file" id="gambar_1" name="gambar_1">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div>
                                    <img src="{{ asset('storage/' . $data->gambar_2) }}" alt=""
                                        style="height: 100px">
                                </div>
                                <label for="gambar_2">Gambar 2</label>
                                <input type="file" id="gambar_2" name="gambar_2">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div>
                                    <img src="{{ asset('storage/' . $data->gambar_3) }}" alt=""
                                        style="height: 100px">
                                </div>
                                <label for="gambar_3">Gambar 3</label>
                                <input type="file" id="gambar_3" name="gambar_3">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @error('gambar_1')
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('gambar_2')
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('gambar_3')
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
