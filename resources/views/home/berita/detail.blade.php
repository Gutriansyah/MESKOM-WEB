@extends('layout.public')
@section('tittle', $tittle)
@section('content')
    <div style="margin-top: 100px"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $berita->judul }}</h1>

                <p>Ditulis Oleh. <a href="/posts?author" class="text-decoration-none">{{ $berita->penulis }}</a> in <a
                        href="/posts?category" class="text-decoration-none">{{ $berita->topik }}</a></p>
                <p>Tanggal : {{ $berita->tanggal_publikasi }}</p>

                <img src="{{ asset('storage/' . ($berita->gambar ? $berita->gambar : 'default-image.jpg')) }}" alt=""
                    class="img-fluid">

                <article class="my-3 fs-6">
                    {!! $berita->konten !!}
                </article>

                <a href="{{ route('halaman-berita') }}" class="d-block mt-3">Back to posts</a>
            </div>
        </div>
    </div>

@endsection
