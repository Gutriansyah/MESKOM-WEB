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
                <form action="{{ route('update-penginapan', $data->id) }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_penginapan">Nama Penginapan</label>
                        <input class="form-control" name="nama_penginapan" id="nama_penginapan"
                            value="{{ $data->nama_penginapan }}">
                        <p class="help-block">*Nama tempat penginapan</p>
                        @error('nama_penginapan')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" name="alamat" id="alamat" value="{{ $data->alamat }}">
                        <p class="help-block">*Alamat tempat penginapan</p>
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
                        <p class="help-block">*Link google maps lokasi penginapan</p>
                        @error('lokasi')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarif">Tarif</label>
                        <input class="form-control" name="tarif" id="tarif" value="{{ $data->tarif }}">
                        <p class="help-block">*Rentang tarif menginap permalam</p>
                        @error('tarif')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input class="form-control" name="kontak" id="kontak" value="{{ $data->kontak }}">
                        <p class="help-block">*Nomor telepon atau whatsapp</p>
                        @error('kontak')
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
                        <p class="help-block">*Deskripsi tempat penginapan</p>
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
