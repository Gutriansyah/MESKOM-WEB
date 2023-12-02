@extends('layout.public')

@section('tittle', $tittle)

@section('content')

    <div style="margin-top: 70px"></div>

    <div class="container w-full">
        <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/' . ($penginapan->gambar_1 ? $penginapan->gambar_1 : 'default-image.jpg')) }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/' . ($penginapan->gambar_2 ? $penginapan->gambar_2 : 'default-image.jpg')) }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/' . ($penginapan->gambar_3 ? $penginapan->gambar_3 : 'default-image.jpg')) }}"
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

            <h1 class="mt-2 mb-2"> {{ $penginapan->nama_penginapan }}</h1>
            <ul>
                <li>
                    <h6 class="card-title mb-1"> Alamat : <span class="">{{ $penginapan->alamat }}</span>
                </li>
                <li>
                    <h6 class="card-title mb-1"> Tarif : <span class="">{{ $penginapan->tarif }}</span></h6>
                </li>
                <li>
                    <h6 class="card-title mb-1"> Kontak : <span class="">{{ $penginapan->kontak }}</span></h6>
                </li>
            </ul>

        </div>
        {!! $penginapan->deskripsi !!}
        <h4 class="mt-3">Lokasi : </h4>
        <div class="d-flex justify-content-center">
            {{-- <iframe src="{{ $wisata->lokasi }}" frameborder="0" width="800" height="300"></iframe><br> --}}
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31896.788662421863!2d101.65381363955078!3d2.1156764000000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d26a5ec6af950f%3A0x443041aad3d129fa!2sPenginapan%20Nabila%20Rupat%20Utara!5e0!3m2!1sen!2sid!4v1686024129123!5m2!1sen!2sid"
                frameborder="0" width="100%" height="300px"></iframe><br>
        </div>
    </div>


@endsection
