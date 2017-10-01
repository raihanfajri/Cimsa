@extends('layouts.app')
@section('css')
    <style>
    .article {
        font-family: 'Avenir Next' !important;
        background: url("{{ url('images/articles').'/'.$articles->image }}");
        background-attachment: fixed;
        -webkit-background-attachment: fixed;
        -moz-background-attachment: fixed;
        -o-background-attachment: fixed;
        background-position: center;
        -webkit-background-position: center;
        -moz-background-position: center;
        -o-background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        color: #fff;
    }
    </style>
@endsection
@section('content')

    <header class="header">
        <div class="jumbotron jumbotron-fluid article">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2"><b>{{ $articles->title }}</b></h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <section class="main-article">
                    <h2 class="page-title">{{ $articles->title }}</h2>
                    <small class="text-muted">
                        <i class="fa fa-user" aria-hidden="true"></i> Posted By: {{$articles->author}}
                        <i class="fa fa-clock-o" aria-hidden="true"></i>  {{$articles->updated_at->format('d F Y')}}
                    </small>
                    <hr>
                    <br>
                    <div class="fr-view">{!! $articles->content !!}</div>
                    <br>
                    <br>
                    <hr>
                    @include('layouts._pesan')
                </section>
            </div>
            <div class="col-md-3">
                <section class="recent-post">
                    <h6><b>Recent Posts</b></h6>
                    <div class="row">
                        @foreach($recentpost as $article)
                            <div class="col-md-6">
                                <img src="{{ url('images/articles').'/'.$article->image }}" alt="article image" width="100%" height="90px">
                            </div>
                            <div class="col-md-6" style="margin-bottom: 30px;">
                                <a href="#">
                                    <p style="font-size: 13px;"><b>{{$article->title}}</b></p>
                                </a>
                                <small class="text-muted">Posted: {{ $article->updated_at->format('d F Y') }}</small>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('login')
@endsection