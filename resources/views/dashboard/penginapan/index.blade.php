@extends('layout.dashboard')

@section('tittle', $tittle)

@section('content')

    <div class="container" style="height: 100vh">
        <h2>
            Halaman Kelola Penginapan
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
        <h4><strong>Data Penginapan :</strong></h4>
        <div class="row">
            <div class="col-lg-9 ">
                <a href="{{ route('create-penginapan') }}"><button type="button"
                        class="btn btn-outline btn-primary btn-sm">Tambah Data</button></a>
            </div>
            <form action="" method="GET">
                <div class="col-lg-3 ">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Cari Tempat Penginapan" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penginapan</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th class="aksi-tb">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $penginapan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penginapan->nama_penginapan }}</td>
                            <td>{{ $penginapan->kontak }}</td>
                            <td>{{ $penginapan->alamat }}</td>
                            <td class="aksi-tb">
                                <a href="{{ route('edit-penginapan', $penginapan->id) }}"> <button type="button"
                                        class="btn btn-outline btn-success btn-sm">Edit</button></a>
                                <form style="display: inline-block"
                                    action="{{ route('delete-penginapan', $penginapan->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
        <!-- /.table-responsive -->
    </div>
@endsection
