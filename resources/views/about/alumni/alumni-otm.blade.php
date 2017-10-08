@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid parralax-activities">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2"><b>ALUMNI OF THE MONTH</b></h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="main-article">
                    <h2 class="page-title">{{$alumni->nama}}</h2>
                    <small class="text-muted">
                        <i class="fa fa-user" aria-hidden="true"></i> Posted By: {{$alumniotm->author}}
                        <i class="fa fa-clock-o" aria-hidden="true"></i>  {{$alumniotm->updated_at->format('d F Y')}}
                    </small>
                    <hr>
                    <br>
                    <img src="{{ asset('images/alumni').'/'.$alumni->image }}" alt="Foto Alumni Of The Month"
                    style="width: 400px; height: 400px;" class="mx-auto d-block img-thumbnail img-fluid">
                    <br>
                    <br>
                    <div class="fr-view">{!! $alumniotm->description !!} </div>
                    <br>
                    <br>
                    <hr>
                    @include('layouts._pesan')
                </section>
            </div>
        </div>
         
    </div>

    @include('login')
@endsection