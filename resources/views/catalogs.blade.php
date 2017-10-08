@extends('layouts.app')

@section('content')
     <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2"><b>OUR PRODUCTS</b></h1>
            </div>
        </div>
    </header>

    <section class="section-2 section-article container">
        <div class="card-deck" style="margin-bottom: 30px;">
            @foreach($catalogs as $catalog)
            <div class="col-md-4">
                <div class="card img-animated-section2">
                    <img class="card-img-top" src="{{ url('images/catalogs').'/'.$catalog->image }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <h4 class="card-title">{{$catalog->name}}</h4>
                            </div>
                            <div class="col-md-5" style="text-align:right">
                                <h6 style="color: red;">Rp. {{$catalog->price}}</h6>
                            </div>
                        </div>
                        <div class="card-text fr-view">{!! $catalog->description !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex">
            {{ $catalogs->links() }}
        </div>
    </section>
    @include('login')
@endsection