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
                        <table width="100%" class="table table-bordered table-responsive" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>SCO</th>
                                    <th>Batch</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Miqdad Abdurrahman Fawwaz</td>
                                    <td>SCOPE</td>
                                    <td>2017</td>
                                    <td>
                                        <a href="{{ asset('img/john.png') }}" data-fancybox="gallery"
                                        data-caption="My Name1">
                                            <img src="{{ asset('img/john.png') }}" 
                                            alt="JOHN" style="width: 140px; height: 130px;"
                                            class="img-thumbnail">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Miqdad Abdurrahman Fawwaz</td>
                                    <td>SCOPE</td>
                                    <td>2017</td>
                                    <td>
                                        <a href="{{ asset('img/john.png') }}" data-fancybox="gallery" 
                                        data-caption="My Name2">
                                            <img src="{{ asset('img/john.png') }}" 
                                            alt="JOHN" style="width: 140px; height: 130px;"
                                            class="img-thumbnail">
                                        </a>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Miqdad Abdurrahman Fawwaz</td>
                                    <td>SCOPE</td>
                                    <td>2017</td>
                                    <td>
                                        <a href="{{ asset('img/john.png') }}" data-fancybox="gallery" 
                                        data-caption="My Name3">
                                            <img src="{{ asset('img/john.png') }}" 
                                            alt="JOHN" style="width: 140px; height: 130px;"
                                            class="img-thumbnail">
                                        </a>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Miqdad Abdurrahman Fawwaz</td>
                                    <td>SCOPE</td>
                                    <td>2017</td>
                                    <td>
                                        <a href="{{ asset('img/john.png') }}" data-fancybox="gallery" 
                                        data-caption="My Name4">
                                            <img src="{{ asset('img/john.png') }}" 
                                            alt="JOHN" style="width: 140px; height: 130px;"
                                            class="img-thumbnail">
                                        </a>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Miqdad Abdurrahman Fawwaz</td>
                                    <td>SCOPE</td>
                                    <td>2017</td>
                                    <td>
                                        <a href="{{ asset('img/john.png') }}" data-fancybox="gallery"  
                                        data-caption="My Name5">
                                            <img src="{{ asset('img/john.png') }}" 
                                            alt="JOHN" style="width: 140px; height: 130px;"
                                            class="img-thumbnail">
                                        </a>
                                    </td>
                                </tr>   
                                    
                            </tbody>    
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>


    @include('login')
@endsection