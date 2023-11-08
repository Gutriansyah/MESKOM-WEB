@extends('layout.dashboard')

@section('tittle', $tittle)

@section('content')

    <div class="container" style="height: 100vh">
        <h2>
            Halaman Kelola berita
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
        <h4><strong>Data Berita :</strong></h4>
        <div class="row">
            <div class="col-lg-9 ">
                <a href="{{ route('create-berita') }}"><button type="button"
                        class="btn btn-outline btn-primary btn-sm">Tambah
                        Data</button></a>
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
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal_Publikasi</th>
                        <th class="aksi-tb">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $berita)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $berita->judul }}</td>
                            <td>{{ $berita->penulis }}</td>
                            <td>{{ $berita->tanggal_publikasi }}</td>
                            <td class="aksi-tb">
                                <a href="{{ route('edit-berita', $berita->id) }}"> <button type="button"
                                        class="btn btn-outline btn-success btn-sm">Edit</button></a>
                                <form style="display: inline-block" action="{{ route('delete-berita', $berita->id) }}"
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
