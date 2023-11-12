<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('tittle')</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/startmin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    {{-- trix --}}
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none
        }
    </style>

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Desa Meskom</a>
            </div>
            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> secondtruth
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="login.html"><i class="fa fa-sign-out fa-fw"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
        </nav>


        <aside class="sidebar navbar-default" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="fa fa-th-list fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard-wisata') }}" class=""><i class="fa fa-image fa-fw"></i>
                            Wisata</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard-penginapan') }}"><i class="fa fa-hotel fa-fw"></i> Penginapan</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard-kuliner') }}"><i class="fa fa-coffee fa-fw"></i> Kuliner</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard-berita') }}"><i class="fa fa-quote-right fa-fw"></i> Berita</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard-galeri') }}"><i class="fa fa-camera fa-fw"></i> Galeri</a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- /.sidebar -->

        <div id="page-wrapper">

            @yield('content')

        </div>

    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/raphael.min.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <script src="{{ asset('js/morris-data.js') }}"></script>
    <script src="{{ asset('js/startmin.js') }}"></script>
    <script src="{{ asset('js/trix.js') }}"></script>

    <script>
        document.addEventListener('trix-file-accept', (even) => {
            even.preventDefault();
        })
    </script>
</body>

</html>
