@extends('layout.public')

@section('tittle', $tittle)

@section('content')

    <div style="margin-top: 70px"></div>

    <div class="container w-full">

        <div class="card mb-3">
            <img src="{{ asset('storage/' . ($kuliner->gambar ? $kuliner->gambar : 'default-image.jpg')) }}"
                class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title">{{ $kuliner->nama_kuliner }}</h3>
                <h6 class="card-title">Rp.{{ $kuliner->harga }}</h6>
                {!! $kuliner->deskripsi !!}
                <p class="card-text">Kategori : <strong class="text-muted">{{ $kuliner->Kategori->nama }}</strong></p>
            </div>
        </div>
    </div>


@endsection
