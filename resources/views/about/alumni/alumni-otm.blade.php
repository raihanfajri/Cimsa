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
                    <h2 class="page-title">NAMA ALUMI</h2>
                    <small class="text-muted">
                        <i class="fa fa-user" aria-hidden="true"></i> Posted By: Admin
                        <i class="fa fa-clock-o" aria-hidden="true"></i>  10 Oktober 2017
                    </small>
                    <hr>
                    <br>
                    <img src="{{ asset('img/john.png') }}" alt="Foto Alumni Of The Month"
                    style="width: 400px; height: 400px;" class="mx-auto d-block img-thumbnail img-fluid">
                    <br>
                    <br>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                        beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                        aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                        <br>
                        <br> Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit
                        esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                    </p>
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