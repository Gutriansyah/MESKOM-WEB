@extends('layout.public')

@section('tittle', $tittle)

@section('content')



    <div class="container" style="margin-top: 100px ">


        <div class="col-lg-6 offset-lg-3">
            <div class="section-heading text-center">
                <h2>Nikmati keindahan alam dan pesona desa Meskom</h2>
                <p>Jelajahi keindahannya</p>
            </div>
        </div>
        <div class="row" style="margin-top: -40px ">
            @foreach ($datas as $item)
                <div class="col-lg-3 mb-5">
                    <div class="card bg-dark text-white">
                        <img src="{{ asset('storage/' . $item->gambar_1) }}" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <div class="bg-white px-1 rounded-sm">
                                {{-- <h5 class="card-title">{{ $item->nama_wisata }}</h5> --}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-1">
                        <h5>
                            <span>
                                <a href="">Galeri {{ $item->nama_wisata }} </a>
                            </span>

                        </h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
