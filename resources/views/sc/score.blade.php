@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center" style="margin-top: 20px;">
                <h1 class="display-3 img-animated-section2"><b>{{ $title }}</b></h1>
                <br>
                <p class="lead">Research Exchange</p>
            </div>
        </div>
    </header>

    <section class="section-2 section-about container">
        <div class="image-about img-animated-section2" style="text-align: center;">
            <img src="{{ asset('img/logo_score_rgb.png') }}" alt="CIMSA LOGO" style="height: 150px;">
        </div>
        <br>
        <div class="content-about img-animated-section2">
            <h4 class="lead" style="color:#d00a2c;">
                <span>
                    SCORE ( Standing Commitee on Research Exchange )
                </span>
            </h4>
            <hr>
            <p style="text-align: justify;">
                <span>HISTORY</span><br>SCORE involves than 70 active National Member Organizations, offering over 2800 research 
                projects to provide more than 1800 medical students worldwide the opportunity to participate in IFMSA research exchange
                program and learn the basic principles of medical research such as literature studies, collecting data, scientific writing,
                lab work, statistics and ethical aspects related to the medicine.<br><br>
                <span>GOALS</span><br>1. To provide research projects in medical curricula in order enabling medical students worldwide to take 
                responsibility for their own curriculum according to their personal interests and to introduce them to basic principles of medical
                research. <br>2. To increase the mobility and widen the horizon of medical students worldwide providing them with the possibility to 
                experince different approaches in medical research, education and treatement by partaking in research projects in other countries. <br>
                3. To enhance the academic quality of the medical student curricula and achieve educational benefits of practical and theoretical knowladge
                in the field of medical research either on basic science of on clinical science with / without lab work. <br> 4. To facilitate collaboration
                and partnership between different medical universities/schools, research institutions and allied medical students across the globe in order to 
                share and spread new achivements in the field of medical research. <br>5. To maintain affordable research exchange tuition through its governing
                body to insure the medical students within the different IFMS NMOs accross the world can participate in this IFMSA program without incurring a financial
                burden.<br><br>
                <span>MISSION</span><br>"<i>To offer future physicians an opportunity to experience research work and the diversity of countries all over the world
                    . Also, to develop both culturally sensitive students and skilled researchers intent on shapng the world of science in the upcoming future.</i>"<br><br>
            </p>
        </div>
    </section>
    @include('login')
@endsection