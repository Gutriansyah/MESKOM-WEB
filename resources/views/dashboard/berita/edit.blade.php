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
                <form action="{{ route('update-berita', $data->id) }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input class="form-control" name="judul" id="judul" value="{{ $data->judul }}">
                        <p class="help-block">*Judul berita artikel</p>
                        @error('judul')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="topik">topik</label>
                        <select class="form-control" id="topik" name="topik" aria-placeholder="Pilih Kategori">
                            <option value="{{ $data->topik }}">{{ $data->topik }}</option>
                            <option value="berita">Pilih Topik</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Politik">Politik</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Hiburan">Hiburan</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Lingkungan">Lingkungan</option>
                            <option value="Internasional">Internasional</option>
                            <option value="Lifestyle">LifeStyle</option>
                            <option value="Sain">Sains</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Kriminalitas">Kriminal</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="Otomotif">Otomotif</option>
                            <option value="Budaya">budaya</option>
                        </select>
                        <p class="help-block">*Topik berita atau artikel</p>
                        @error('Topik')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                The kategori id field required.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input class="form-control" name="penulis" id="penulis" value="{{ $data->penulis }}">
                        <p class="help-block">*Penulis berita</p>
                        @error('penulis')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                        <input class="form-control" type="date" name="tanggal_publikasi" id="tanggal_publikasi"
                            value="{{ $data->tanggal_publikasi }}">
                        <p class="help-block">*Tanggal berita dibuat atau dipublikasi</p>
                        @error('tanggal_publikasi')
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <input class="form-control" name="konten" id="konten" type="hidden"
                            value="{{ $data->konten }}">
                        <trix-editor input="konten"></trix-editor>
                        <p class="help-block">*Isi berita</p>
                        @error('konten')
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
                                    <img src="{{ asset('storage/' . $data->gambar) }}" alt=""
                                        style="height: 100px">
                                </div>
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
