@extends('layout.public')

@section('tittle', $tittle)

@section('content')

    <style>
        .card {
            position: relative;
            overflow: hidden;
        }

        .card-img {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-img {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .card:hover .card-overlay {
            opacity: 1;
        }

        .card-title {
            color: #000;
            /* Ganti dengan warna teks yang sesuai */
            font-size: 18px;
            /* Sesuaikan ukuran font */
            margin-bottom: 8px;
        }
    </style>

    <div class="container" style="margin-top: 100px ">
        <div class="col-lg-6 offset-lg-3">
            <div class="section-heading text-center">
                <h2>Galeri Desa {{ $wisata->nama_wisata }}</h2>
            </div>
        </div>
        {{-- <div class="row" style="margin-top: -40px ">
            @foreach ($galeri as $item)
                <div class="col-lg-4 mb-5">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $item->id }}">
                        <div class="card bg-dark text-white">
                            <img id="gambar" src="{{ asset('storage/' . $item->gambar) }}" class="card-img"
                                alt="..." style="height: 230px">
                        </div>
                    </a>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p> {{ $item->gambar }} </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        <div class="row" style="margin-top: 30px">
            @foreach ($galeri as $item)
                <div class="col-lg-4 mb-5">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                        <div class="card bg-dark text-white">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img" alt="..."
                                style="height: 230px">
                        </div>
                    </a>
                </div>

                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img" alt="...">
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    {{-- 
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}


@endsection
