@extends('layout.public')

@section('tittle', $tittle)

@section('content')


    <div class="amazing-deals">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Temukan Penawaran dan Harga yang menarik</h2>
                        <p>tentukan pilihan sesuai kebutuhan dan selera serta budged anda</p>
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
                                                    placeholder="Cari Tempat Penginapan">
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
                    <div class="col-lg-6 col-sm-6">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image">
                                        <img src="{{ asset('storage/' . $item->gambar_1) }}" alt=""
                                            style="height: 360px">
                                    </div>
                                </div>
                                <div class="col-lg-6 align-self-center">
                                    <div class="content">
                                        <h4>{{ $item->nama_penginapan }}</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <i class="fa fa-location"></i>
                                                <span class="list">Kontak : {{ $item->kontak }}</span>
                                            </div>
                                            <div class="col-12">
                                                <i class="fa fa-phone"></i>
                                                <span class="list">Tarif :{{ $item->tarif }}/malam</span>
                                            </div>
                                            <div class="col-12">
                                                <i class="fa fa-wallet"></i>
                                                <span class="list">Alamat :{{ $item->alamat }}</span>
                                            </div>
                                        </div>
                                        <p></p>
                                        {{-- <article> {!! Str::limit($item->deskripsi, 200, '...') !!}</article> --}}
                                        <div class="main-button">
                                            <a href="{{ route('detail-penginapan', $item->id) }}">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



@endsection
