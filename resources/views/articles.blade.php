@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2"><b>{{ $data['title'] }}</b></h1>
            </div>
        </div>
    </header>

    <section class="section-2 section-article container">
        <div class="card-deck" style="margin-bottom: 20px;">
            @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card img-animated-section2">
                    <img class="card-img-top" 
                    src="{{ url('images/articles').'/'.$article->image }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">Posted :{{ $article->updated_at->format('d F Y') }}</small></p>
                        <h4 class="card-title">{{ $article->title }}</h4>
                        <div class="card-text fr-view">{{ substr(strip_tags($article->content),0,80).'...' }}
                            <a href="{{ route('articles.detail', $article->id) }}">[ Read more ]</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex">
            {{ $articles->links() }}
        </div>
    </section>

    @include('login')
@endsection