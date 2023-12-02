@extends('layout.public')

@section('tittle', $tittle)

@section('content')

    <div class="about-main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <div class="blur-bg"></div>
                        <h4>Jelajahi Desa Kami</h4>
                        <div class="line-dec"></div>
                        <h2>Welcome To Desa Meskom</h2>
                        <p>LSelamat datang di desa Meskom, sebuah tempat di mana keindahan alam bertemu dengan kehangatan
                            masyarakat. Kami bangga menjadi bagian dari komunitas yang penuh kebersamaan dan inovasi.
                            Jelajahi keunikan kami, saksikan perkembangan, dan bergabunglah dalam perjalanan menuju masa
                            depan yang lebih cerah bersama-sama. Selamat menikmati pengalaman kami!</p>
                        <div class="main-button">
                            <a href="#1">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="cities-town" id="1">
        <div class="container">
            <div class="row">
                <div class="slider-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Wisata <em>Desa Meskom</em></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="owl-cites-town owl-carousel">

                                @foreach ($wisatas as $wisata)
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/' . $wisata->gambar_1) }}" alt=""
                                                style="height: 250px">
                                            <h4>{{ $wisata->nama_wisata }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="food-town">
        <div class="container">
            <div class="row">
                <div class="slider-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Kuliner <em>Desa Meskom</em></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="owl-cites-town owl-carousel">

                                @foreach ($kuliners as $kuliner)
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/' . $kuliner->gambar) }}" alt=""
                                                style="height: 250px">
                                            <h4>{{ $kuliner->nama_kuliner }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="weekly-offers" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Temukan Tempat Penginapan terbaik</h2>
                        <p>temukan penginapan yang sesuai dengan kenyamanan anda dan temukan reantang harga terbaik</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-top: 30px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-weekly-offers owl-carousel">

                        @foreach ($penginapans as $penginapan)
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('storage/' . $penginapan->gambar_1) }}" alt=""
                                        style="height: 300px">
                                    <div class="text">
                                        <h4>{{ $penginapan->nama_penginapan }}<br></h4>
                                        <div class="line-dec"></div>
                                        <ul>
                                            <li>Informasi:</li>
                                            <li><i class="fa fa-wallet"></i> Rp. {{ $penginapan->tarif }} / Malam</li>
                                            <li><i class="fa fa-phone"></i> Wa/Tlp. {{ $penginapan->kontak }}</li>
                                            <li><i class="fa fa-location"></i> : {{ $penginapan->alamat }} </li>
                                        </ul>
                                        <div class="main-button">
                                            <a href="reservation.html">Informasi Detail</a>
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

    <div class="more-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-image">
                        <img src="{{ asset('images/about-left-image.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Temukan Lebih Banyak Tentang Desa Kami</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="info-item">
                                <h4> Lebih Dari : {{ $wisatas->count() - 1 }}</h4>
                                <span>Tempat Wisata</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info-item">
                                <h4> Lebih Dari : {{ $penginapans->count() - 1 }} </h4>
                                <span>Tempat Penginapan</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info-item">
                                <h4>Lebih Dari : {{ $kuliners->count() - 1 }} </h4>
                                <span>Makanan Enak</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info-item">
                                <h4>Lebih Dari : {{ $beritas->count() - 1 }} </h4>
                                <span>Berita Desa Meskom</span>
                            </div>
                        </div>
                    </div>
                    <div class="main-button">
                        <a href="reservation.html">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
