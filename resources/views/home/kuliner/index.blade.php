@extends('layout.public')

@section('tittle', $tittle)

@section('content')


    <div class="page-heading mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Temukan Berbagai Kuliner Desa Meskom</h4>
                    <h2>Makanan &amp; Minuman</h2>
                    <div class="border-button"><a href="about.html">Discover More</a></div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2>Temukan Bebagai Macam Kuliner</h2>
                    <p>Tentukan pilihan sesuai kebutuhan dan selera serta budged anda</p>
                </div>
            </div>

            <div class="reservation-form">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="reservation-form" name="gs" method="GET" role="search" action=""
                                style="background-color: white; padding: 10px; margin: 10px">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <fieldset>
                                            <input type="text" name="search" class="Name"
                                                placeholder="Cari Nama Kuliner">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3">
                                        <fieldset>
                                            <button type="submit" class="main-button">Search</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($datas as $item)
                <div class="col-lg-3 col-sm-12 justify-center">
                    <div class="card mb-3">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_kuliner }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Harga : {{ $item->harga }}</li>
                            <li class="list-group-item">Kategori : {{ $item->Kategori->nama }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('detail-kuliner', $item->id) }}" class="stretched-link">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
