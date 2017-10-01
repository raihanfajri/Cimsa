@extends('layouts.app')


@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2 "><b>OUR ALUMNI</b></h1>
            </div>
        </div>
    </header>

    <div class="container section-4 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Alumni list
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Our Alumni</h4>
                        {!! $html->table(['class'=>'table table-bordered']) !!} 
                    </div>
                </div> 
            </div>
        </div>
    </div>


    @include('login')
@endsection
@section('script')
    {!! $html->scripts() !!}
@endsection