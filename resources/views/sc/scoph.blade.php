@extends('layouts.app')


@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center" style="margin-top: 20px;">
                <h1 class="display-3 img-animated-section2"><b>{{$title}}</b></h1>
                <br>
                <p class="lead">Public Health</p>
            </div>
        </div>
    </header>

    <section class="section-2 section-about container">
        <div class="image-about img-animated-section2" style="text-align: center;">
            <img src="{{ asset('img/logo_scoph_rgb.png') }}" alt="CIMSA LOGO" style="height: 150px;">
        </div>
        <br>
        <div class="content-about img-animated-section2">
            <h4 class="lead" style="color:#d00a2c;">
                <span>
                    SCOPH ( Standing Commitee on Public Health )
                </span>
            </h4>
            <hr>
            <p style="text-align: justify;">
                <span>HISTORY</span><br>SCOPH, stands for Standing Commitee on Public Health works through health promotion and education
                as well as disseas' prevention to the society. SCOPH focuses on Non Communcation Disease, Universal Health Coverage, Social
                & Environmental Determinants of Health, and many more. SCOPH CIMSA has initiated several programs that aim to increase
                the health quality within the society. These programs have been done through social media champaigns, health services
                , seminars and other events that were done by medical students. SCOPH has annual projects such as Indonesian Disease Today,
                World Diabetes Day, and World No Tobacco Day.<br><br>
                <span>GOALS</span><br>1. To improve awareness and knowladge of the community about public health. <br>
                2. To trigger Indonesian medical student's awareness about public health related issues. <br> 3. To facilitate Indonesian medical students' activity
                in public health to provide opportunities for medical student's to be involved in a real work concerning public health. <br>
                4. To create programs (of public health) that are fit with Indonesia's current conditions and needs. <br> 5. To coorporate and to build partnership with
                governmental organization and/or non-governmental organization that<br><br>
                <span>MISSION</span><br>"<i>To promote Human Rights and Peace, as future health care professionals we work towards empowering and improving the health
                    refugees and other vulnerable people.</i>"<br><br>
            </p>
        </div>
    </section>
    @include('login')
@endsection