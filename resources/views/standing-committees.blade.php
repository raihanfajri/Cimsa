@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2 title-sc"><b>STANDING COMMITEES</b></h1>
            </div>
        </div>
    </header>

    <section class="section-2 section-sc container">
         <div class="row">
            <div class="col-md-4 img-animated-section2">
                <a href="{{ url('standing-committees','scome') }}">
                    <img src="/img/logo_scome_rgb.png" alt="SCOME" style="width: 100%">
                </a>
            </div>
            <div class="col-md-4 img-animated-section2">
                <a href="{{ url('standing-committees','scope') }}">
                    <img src="/img/logo_scope_rgb.png" alt="SCOPE" style="width: 100%">
                </a>
            </div>
            <div class="col-md-4 img-animated-section2">
                <a href="{{ url('standing-committees','scoph') }}">
                    <img src="/img/logo_scoph_rgb.png" alt="SCOPH" style="width: 100%">
                </a>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4 img-animated-section2">
                <a href="{{ url('standing-committees','scora') }}">
                    <img src="/img/SCORA-1-1.png" alt="SCORA" style="width: 100%">
                </a>
            </div>
            <div class="col-md-4 img-animated-section2">
                <a href="{{ url('standing-committees','score') }}">
                    <img src="/img/logo_score_rgb.png" alt="SCORE" style="width: 100%">
                </a>
            </div>
            <div class="col-md-4 img-animated-section2">
                <a href="{{ url('standing-committees', 'scorp') }}">
                    <img src="/img/logo_scorp_rgb.png" alt="SCORP" style="width: 100%">
                </a>
            </div>
         </div>
    </section>

    @include('login')
@endsection