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
                        <table width="100%" class="table table-bordered table-responsive" id="dataTables-alumni">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>SCO</th>
                                    <th>Batch</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($alumni as $item)
                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->sco}}</td>
                                    <td>{{$item->batch}}</td>
                                    <td>
                                        <a href="{{ asset('images/alumni').'/'.$item->image }}" data-fancybox="gallery"
                                        data-caption="{{$item->nama}}">
                                            <img src="{{ asset('images/alumni').'/'.$item->image }}" 
                                            alt="{{$item->nama}}" style="width: 140px; height: 130px;"
                                            class="img-thumbnail">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                        <div class="d-flex">
                            {{ $alumni->links() }}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>


    @include('login')
@endsection