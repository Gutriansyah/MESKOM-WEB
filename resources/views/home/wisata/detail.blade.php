@extends('layout.public')

@section('tittle', $tittle)

@section('content')

    <div style="margin-top: 70px"></div>

    <div class="container w-full">
        <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/' . ($wisata->gambar_1 ? $wisata->gambar_1 : 'default-image.jpg')) }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/' . ($wisata->gambar_2 ? $wisata->gambar_2 : 'default-image.jpg')) }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/' . ($wisata->gambar_3 ? $wisata->gambar_3 : 'default-image.jpg')) }}"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="card-body mt-3 mb-2">
            <h1 class="mt-2 mb-2">{{ $wisata->nama_wisata }}</h1>
            <h6 class="card-title"> Alamat : <span>{{ $wisata->alamat }}</span></h6>
        </div>
        {!! $wisata->deskripsi !!}
        <h4 class="mt-3">Lokasi : </h4>
        {{-- <p>{{ $wisata->lokasi }}</p> --}}
        <div class="d-flex justify-content-center">
            {{-- <iframe src="{{ $wisata->lokasi }}" frameborder="0" width="800" height="300"></iframe><br> --}}
            <iframe src="{{ $wisata->lokasi }}" frameborder="0" width="100%" height="300px"></iframe><br>

        </div>
    </div>


@endsection
