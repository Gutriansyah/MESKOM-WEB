@extends('layout.public')

@section('tittle', $tittle)

@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="text-center">
            <h1>Halaman Berita dan Artikel</h1>
        </div>
        <div class="row">
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
                                                placeholder="Cari Berita atau Artikel">
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
                <div class="col-lg-6 col-sm-12">
                    <div class="card mb-3 mx-auto" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="..." style="height: 190px">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="">
                                        <h6 class="card-title">{{ $item->judul }}</h6>
                                    </a>
                                    <p>Penulis : {{ $item->penulis }}, {{ $item->tanggal_publikasi }}</p>
                                    <p class="" style="margin-top: -9px">Topik : {{ $item->topik }}</p>
                                    <article style="font-size: 14px"> {!! Str::limit($item->konten, 80, '') !!}</article>
                                    <a href="{{ route('detail-berita', $item->id) }}" style="font-size: 12">
                                        Selengkapnya...
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-5">
                <div class="d-flex justify-content-center">
                    {{ $datas->links() }}
                </div>
            </div>
        </div>


    @endsection
