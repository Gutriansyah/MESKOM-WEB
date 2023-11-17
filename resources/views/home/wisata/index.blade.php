@extends('layout.public')

@section('tittle', $tittle)

@section('content')


    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Temukan Berbagai Tempat</h4>
                    <h2>Wisata &amp; Hiburan</h2>
                    <div class="border-button"><a href="#1">Discover More</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="visit-country">
        <div class="container" id="#1">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h2>Kunjungi Desa Kami Sekarang</h2>
                        <p>
                            Temukan tempat wisata dan rekreasi untuk diri anda dan keluarga
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="items">
                        <div class="row">

                            @foreach ($datas as $item)
                                <div class="col-lg-12">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-5">
                                                <div class="image">
                                                    <img src="{{ asset('storage/' . $item->gambar_1) }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-sm-7">
                                                <div class="right-content">
                                                    <h4>{{ $item->nama_wisata }}</h4>
                                                    <span> {{ Str::limit($item->alamat, 60, '...') }}</span>
                                                    <div class="main-button">
                                                        <a href="about.html">Galeri</a>
                                                    </div>
                                                    <article class="mt-3">
                                                        {!! Str::limit($item->deskripsi, 230, '...') !!}
                                                    </article>
                                                    <div class="text-button">
                                                        <a href="about.html">Detail
                                                            <i class="fa fa-arrow-right"></i></a>
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
            </div>
        </div>
    </div>



@endsection
