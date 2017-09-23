@extends('layouts.app')


@section('content')
     <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center" style="margin-top: 20px;">
                <h1 class="display-3 img-animated-section2"><b>{{ $title }}</b></h1>
                <br>
                <p class="lead">Human Rights & Peace</p>
            </div>
        </div>
    </header>

    <section class="section-2 section-about container">
        <div class="image-about img-animated-section2" style="text-align: center;">
            <img src="{{ asset('/img/logo_scorp_rgb.png') }}" alt="CIMSA LOGO" style="height: 150px;">
        </div>
        <br>
        <div class="content-about img-animated-section2">
            <h4 class="lead" style="color:#d00a2c;">
                <span>
                    SCORP ( Standing Commitee on Human Rights and Peace )
                </span>
            </h4>
            <hr>
            <p style="text-align: justify;">
                <span>HISTORY</span><br>SCORP (Standing Commitee on Human Rights and Peace ) is one of the six standing committess that engaged
                in the field of human rights and peace. SCORP facilitates all Indonesian medical students who have an interest and desire
                to know the issues related to human rights and peace in Indonesian and other countries. SCORP pays attention to refugees, internally
                displaced people and vulnerable people because this group is the most vulnerable human rights violated, especially rights in the health
                field. SCORP has four domains of work which are pre and post disaster management, universal health coverage, refugees' health, and 
                vulnerable people.<br><br>
                <span>GOALS</span><br>1. To provide education in the field of human rights an peace. <br> 2. To increase of awareness and educate prospective
                health professionals in the field of health systems refugees, displaced persons and other vulnerable people. <br> 
                3. To establish a culture of peace, conflict prevention and respect for human rights.<br> 4. To be ready to act order to Achieve a solution
                to Achieve peace over conflicts. <br> 5. To establish and develop multidisciplinary cooperation Relating to Scorp work fields. <br>
                6. To Participate, both within the local, national and international, in the field of Refugees/IDPS, displaced people and other vulnerable people.
                <br>7. To coorporate with NGO's (Non Government Organizations) to create projects or activities related to Scorp work fields<br><br>
                <span>MISSION</span><br>"<i>To promote Human Rights and Peace, as future health care professionals we work towards empowering and improving the health
                    refugees and other vulnerable people.</i>"<br><br>
            </p>
        </div>
    </section>
    @include('login')
@endsection