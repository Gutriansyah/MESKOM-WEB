@extends('layout.public')

@section('tittle', $tittle)

@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="row">
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
                                        <h5 class="card-title">{{ $item->judul }}</h5>
                                    </a>
                                    <p>Penulis : {{ $item->penulis }}, {{ $item->tanggal_publikasi }}</p>
                                    <p class="" style="margin-top: -9px">Topik : {{ $item->topik }}</p>
                                    <article> {!! Str::limit($item->konten, 80, '') !!}</article>
                                    <a href="">
                                        <small class="text-muted">Selengkapnya...</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
