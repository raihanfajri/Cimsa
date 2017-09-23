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
            <div class="card img-animated-section2">
                <img class="card-img-top" 
                src="https://bestdoctors.com/wp-content/uploads/2016/11/Doctor-with-Tablet.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Posted :6 September 2017</small></p>
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                        is a little bit longer. 
                        <a href="{{ route('articles.detail', $data['id']) }}">[ Read more.... ]</a></p>
                </div>
            </div>
            <div class="card img-animated-section2">
                <img class="card-img-top" 
                src="https://bestdoctors.com/wp-content/uploads/2016/11/Doctor-with-Tablet.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Posted :6 September 2017</small></p>
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">This card has supporting text below 
                        as a natural lead-in to additional content. 
                        <a href="{{ route('articles.detail', $data['id']) }}">[ Read more.... ]</a></p>
                </div>
            </div>
            <div class="card img-animated-section2">
                <img class="card-img-top" 
                src="https://bestdoctors.com/wp-content/uploads/2016/11/Doctor-with-Tablet.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Posted :6 September 2017</small></p>
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card
                        has even longer content than the first to show that equal height action. 
                        <a href="{{ route('articles.detail', $data['id']) }}">[ Read more.... ]</a></p>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <ul class="pagination mx-auto">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
        </div>
    </section>

    @include('login')
@endsection