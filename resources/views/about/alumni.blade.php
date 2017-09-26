@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2 "><b>ALUMNI</b></h1>
            </div>
        </div>
    </header>
    <section class="container section-4">
        <div class="row">
            <div class="col-md-6 card" style="border: none; !important">
                <a href="{{ url('about/alumni/alumni-of-the-month') }}">
                    <span class="img-preview fade-caption text-center ">
                        <br><br><br><br>
                        <h4>ALUMNI OF THE MONTH</h4>
                        <br><br>
                        <i class="fa fa-arrow-circle-o-right fa-2x" aria-hidden="true"></i>
                    </span>
                </a>
                <img src="https://catatankuliahnya.files.wordpress.com/2008/10/psikm001.jpg" 
                    alt="Alumni of the Month" class="card-img-top" style="height: auto; width: 100%;">
            </div>
            <div class="col-md-6 card" style="border: none; !important">
                <a href="{{ url('about/alumni/directory') }}">
                    <span class="img-preview fade-caption  ext-center">
                        <br><br><br><br>
                        <h4>ALUMNI DIRECTORY</h4>
                        <br><br>
                        <i class="fa fa-arrow-circle-o-right fa-2x" aria-hidden="true"></i>
                    </span>
                </a>
                <img src="https://catatankuliahnya.files.wordpress.com/2008/10/psikm001.jpg" 
                    alt="ALUMNI DIR"style="height: auto; width: 100%;">
            </div>
        </div>
    </section>
    @include('login')
@endsection