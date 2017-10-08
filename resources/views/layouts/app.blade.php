<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Miqdad and Raihan">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CIMSA UNAND</title>

    <link rel="shortcut icon" href="{{ asset('img/logo/logo-primary.png') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link rel="stylesheet" href="{{asset('/css/froala_style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/froala_editor.pkgd.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/froala_editor.min.css')}}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{asset('/vendor/datatables-plugins/dataTables.bootstrap.css')}}">
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="{{asset('/vendor/datatables-responsive/dataTables.responsive.css')}}">
    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css">
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo/logo-nav.png')}}">
        </a>
        <button class=" navbar-toggle navbar-toggler"
         type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation" style="border: none !important; color: #d00a2c;">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('/') }}">
                        <b>Home</b><span class="sr-only">(current)</span>
                    </a>
                </li>
                
                <li class="nav-item dropdown {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-center" 
                    href="#" id="navbarDropdownLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <b>About    <i class="fa fa-caret-down" aria-hidden="true"></i></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownLink">
                        <a href="{{ url('about', 'cimsa') }}" class="dropdown-item">CIMSA</a>
                        <a href="{{ url('about', 'official-partners') }}" class="dropdown-item">Official Partners</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('about/alumni/directory') }}" class="dropdown-item">Our Alumni</a>
                        <a href="{{ url('about/alumni/alumni-of-the-month') }}" class="dropdown-item">Alumni of The Month</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('articles') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('/articles') }}"><b>Articles</b></a>
                </li>
                <li class="nav-item {{ Request::is('activities') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('/activities') }}"><b>Activities</b></a>
                </li>
                 <li class="nav-item {{ Request::is('standing-committees') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('/standing-committees') }}"><b>Standing Committees</b></a>
                </li>
                @if(!Auth::check())
                    <li class="nav-item ">
                        <a class="nav-link text-center" href="#" data-toggle="modal" data-target=".login-modal-lg"><b>Login</b></a>
                    </li>
                    @else
                    <li class="nav-item ">
                        <a class="nav-link text-center" href="{{ url('/admin') }}" ><b>Admin Page</b></a>
                    </li>
                @endif
                <a href="{{ url('catalogs') }}" style="margin-right: 20px;" id="catalogs">
                    <i class="fa fa-shopping-cart fa-2x text-center" aria-hidden="true"></i>
                </a>
            </ul>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="py-5 bg-dark ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pull-left">
                    <p class="m-0 text-white">Local Secretariat: </p>
                    <p class="m-0 text-white">Faculty of Medicine, Andalas University</p>
                    <p class="m-0 text-white">Jl. Perintis Kemerdekaan</p>
                    <p class="m-0 text-white">Padang, 25127</p>
                    <p class="m-0 text-white">Copyright &copy; CIMSA UNAND 2017</p>
                </div>
                <div class="col-md-6 ">
                    <h5 class="pull-right">
                        <span class="fa-stack fa-lg img-animated-footer">
                            <a href="https://www.facebook.com/cimsafkunand/?ref=ts&fref=ts">
                                <i class="fa fa-circle fa-stack-2x logo-fb"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </a>
                        </span>

                        <span class="fa-stack fa-lg img-animated-footer">
                            <a href="https://twitter.com/cimsaunand">
                                <i class="fa fa-circle fa-stack-2x logo-twitter"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </a>
                        </span>

                        <span class="fa-stack fa-lg img-animated-footer">
                            <a href="https://www.instagram.com/cimsaunand/">
                                <i class="fa fa-circle fa-stack-2x logo-instagram"></i>
                                <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                            </a>
                        </span>

                        <span class="fa-stack fa-lg img-animated-footer">\
                            <a href="https://www.youtube.com/channel/UCnSEulZ2b1Rtlb8USFDjGrA">
                                 <i class="fa fa-circle fa-stack-2x logo-youtube"></i>
                                <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
                            </a>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/froala_editor.pkgd.min.js')}}"></script>
    <script src="https://platform.twitter.com/widgets.js"></script>
    <script src="http://lightwidget.com/widgets/lightwidget.js"></script>
    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="{{asset('/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
    <!-- SweetAlert 2 JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>
    @yield('script')
    <script>
        $('.pagination').addClass('mx-auto')
        $('.pagination').children().addClass('page-item')
        $('.pagination').children().children('a').addClass('page-link')
        $('.pagination').children().children('span').addClass('page-link')
    </script>
    @if(session('completemessage'))
        <script>
            console.log("{{ session('completemessage') }}")
            swal(
                'Konfirmasi Pesan',
                "{{ session('completemessage') }}",
                'success'
            )
        </script>
    @endif
</body>
</html>