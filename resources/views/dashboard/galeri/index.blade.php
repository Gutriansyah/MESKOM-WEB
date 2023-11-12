@extends('layout.dashboard')

@section('tittle', $tittle)

@section('content')

    <div class="container" style="height: 100vh">
        <h2>
            Halaman Kelola Galeri
        </h2>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <a href="#" class="alert-link">{{ session('status') }}</a>.
                    </div>
                @endif
            </div>
        </div>
        <h4><strong>Data Galeri :</strong></h4>
        <div class="row">
            <div class="col-lg-9 ">
                <a href="{{ route('create-galeri') }}"><button type="button"
                        class="btn btn-outline btn-primary btn-sm">Tambah Data</button></a>
            </div>
            <div class="col-lg-3 ">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Wisata</th>
                        <th>Nama Gambar</th>
                        <th>Gambar</th>
                        <th class="aksi-tb">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $galeri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $galeri->wisata->nama_wisata }}</td>
                            <td>{{ $galeri->nama }}</td>
                            <td>
                                <div>
                                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt=""
                                        style="height: 70px; width:135px">
                                </div>
                            </td>
                            <td class="aksi-tb">
                                <a href="{{ route('edit-galeri', $galeri->id) }}"> <button type="button"
                                        class="btn btn-outline btn-success btn-sm">Edit</button></a>
                                <form style="display: inline-block" action="{{ route('delete-galeri', $galeri->id) }}"
                                    method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
