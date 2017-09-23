@extends('layouts.app')

@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item img-responsive active" 
                style="background-image: url('/img/slider1.jpg')">
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item img-responsive" 
                style="background-image: url('/img/slider2.jpg')">
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item img-responsive" 
                style="background-image: url('/img/slider3.jpg')">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content 2-->
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center img-animated-section2">
                    <a href="/about.html" style="text-decoration: none; color: #000 !important;">
                        <div class="section-2-logo text-center">
                            <i class="fa fa-rocket" aria-hidden="true"></i>
                        </div>
                    </a>
                    <h4 style="margin-top: 20px;"><b>About us</b></h4>
                </div>
               <div class="col-md-6 text-center img-animated-section2">
                    <div class="section-2-logo text-center">
                       <i class="fa fa-cogs" aria-hidden="true"></i>
                    </div>
                    <h4 style="margin-top: 20px;"><b>Our Team</b></h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content 3-->
    <section class="section-3">
        <div class="container text-center">
            <img src="{{ asset('img/logo/logo-section3.png') }}" alt="logo-section3">
            <br>
            <br> 
            <div class="row">
                <div class="col-md-4 text-center img-animated-section3">
                    <i class="fa fa-map-marker fa-5x" aria-hidden="true"></i>
                    <br>
                    <br>
                    <h4>
                        <b>
                            <span class="counter" data-count="22">0</span>
                            <p> LOCALS</p>
                        </b>
                    </h4>
                </div>
                <div class="col-md-4 text-center img-animated-section3">
                    <i class="fa fa-check-square fa-5x" aria-hidden="true"></i>
                    <br>
                    <br>
                    <h4>
                        <b>
                            <span class="counter" data-count="8000">7500</span>
                            <p>PROJECTS</p>
                        </b>
                    </h4>  
                </div>
                <div class="col-md-4 text-center img-animated-section3">
                    <i class="fa fa-group fa-5x" aria-hidden="true"></i>
                    <br>
                    <br>
                    <h4>
                        <b>
                            <span class="counter" data-count="600">500</span>
                            <p>MEMBERS</p>
                        </b>
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content 4 -->
    <section class="section-4">
        <div class="container">

            <h3 class="img-animated-section4"><b>Recent Updates</b></h3>
            <br>
            <br>
            <div class="row">
               <div class="col-md-4 col-xs-12">
                    <div class="card img-animated-section4" style="width: 20rem;">
                        <img class="card-img-top" 
                        src="https://catatankuliahnya.files.wordpress.com/2008/10/psikm001.jpg" 
                        alt="Card image cap">
                        <span class="img-preview fade-caption">
                            <p>Lorem ipsum dolor sit amet, 
                            lLorem ipsum dolor sit amet, 
                            lLorem ipsum dolor sit amet, lLorem ipsum dolor sit amet... 
                            <a href="articles-detail.html#disqus_thread">read more</a></p>
                        </span>
                        <div class="card-body">
                            <h4 class="card-text">HBDI 2017</h4>
                        </div>
                    </div>
               </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card img-animated-section4" style="width: 20rem;">
                        <img class="card-img-top" 
                        src="https://catatankuliahnya.files.wordpress.com/2008/10/psikm001.jpg" 
                        alt="Card image cap">
                        <span class="img-preview fade-caption">
                            <p>Lorem ipsum dolor sit amet, 
                            lLorem ipsum dolor sit amet, 
                            lLorem ipsum dolor sit amet, lLorem ipsum dolor sit amet... 
                            <a href="articles-detail.html#disqus_thread">read more</a></p>
                        </span>
                        <div class="card-body">
                            <h4 class="card-text">Upgrading CIMSA UNAND</h4>
                        </div>
                    </div>
               </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card img-animated-section4" style="width: 20rem;">
                        <img class="card-img-top" 
                        src="https://catatankuliahnya.files.wordpress.com/2008/10/psikm001.jpg" 
                        alt="Card image cap">
                        <span class="img-preview fade-caption">
                            <p>Lorem ipsum dolor sit amet, 
                            lLorem ipsum dolor sit amet, 
                            lLorem ipsum dolor sit amet, lLorem ipsum dolor sit amet... 
                            <a href="articles-detail.html#disqus_thread">read more</a></p>
                        </span>
                        <div class="card-body">
                            <h4 class="card-text">Working Assembly 2017</h4>
                        </div>
                    </div>
               </div>
            </div>
            <h3 class="img-animated-section4"><b>Videos</b></h3>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card img-animated-section4" style="width: 20rem;">
                        <div class="embed-responsive embed-responsive-16by9 card-img-top">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/UOZd6QQ0hq4" 
                            frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h4 class="card-text">CIMSA UNAND Profile - Video</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="img-animated-section5"><i class="fa fa-twitter" aria-hidden="true"></i> <b>TWITTER</b></h4>
                    <br>
                    <br>
                    <div class="img-animated-section5"> 
                        <a class="twitter-timeline img-animated-section5" 
                        href="https://twitter.com/cimsaunand"
                        data-width="400" data-height="400">Tweets by cimsaunand</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 class="img-animated-section5"><i class="fa fa-instagram" aria-hidden="true"></i> <b>INSTAGRAM</b></h4>
                    <br>
                    <br>
                    <!-- LightWidget WIDGET -->
                    <!-- <iframe src="http://lightwidget.com/widgets/214bb146aced5626966160484f1fab84.html" 
                    scrolling="no" allowtransparency="true"
                    class="lightwidget-widget img-animated-section5" style="width: 100%; border: 0; overflow: hidden;"></iframe> -->
                    <iframe src="http://lightwidget.com/widgets/7f5b130c742857a1940b0d2c74e56e7c.html" 
                    scrolling="no" allowtransparency="true" class="lightwidget-widget img-animated-section5" 
                    style="width: 100%; border: 0; overflow: hidden;"></iframe>
                </div>
            </div>
        </div>
    </section>

    @include('login');

@endsection