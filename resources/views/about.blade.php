@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2"><b>{{ $title }}</b></h1>
            </div>
        </div>
    </header>

    <section class="section-2 section-about container">
        <div class="image-about img-animated-section2" style="text-align: center;">
            <img src="{{ asset('img/logo/logo-primary.png') }}" alt="CIMSA LOGO">
        </div>
        <div class="content-about img-animated-section2">
            <p style="text-align: justify;">
                <span>HISTORY</span><br>CIMSA was officially established in May, 6th 2001 by some medical students from various city of Indonesia based
                on the inclination for an organization that based on ongoing activities; utilize the developing technology,
                with internationally standard programs to support medical students in Indonesia CIMSA held its first General
                Assembly at May, 11-13 2001 and become affiliation with International Federation of Medical Students’ Associations
                (IFMSA) in 2002. Since then, CIMSA has 21 locals spread in various Faculty of Medicine throughout Indonesia
                and continues to grow. <br><br>
                <span>VISION</span><br>“To empower Indonesia medical students in order to create a healthier, more
                secure and more prosperous Indonesia where people can enjoy equal opportunities in education and health and
                also in effort to improve lives and also reach prosperity and social justice. In addition is to reach universally
                healthier lives for a healthier world."<br><br> 
                <span>MISSION</span><br>"To empower medical students to be able to actively learn
                and create, and also to plan strategies and execute movements to improve nation’s health and well being."<br><br>
                <span>OUR GOALS</span><br>To be the media between Indonesian medical student and professional organizations, both governmental
                and non governmental, in order to intensify cooperation for public interests. To increase the capacity of
                Indonesian medical students, to use the capacities and capabilities as a medical student to nourish and educate
                the nation, to actively cooperate with the international community in the effort to improve the world’s health,
                and fight for the dignity and sovereignty of Indonesia in the eyes of other nations in the world. Actively
                improve nation’s health by real activities in community. Actively support the improvement of medical education
                in Indonesia. To provide a forum for medical students in Indonesia to discuss topics related to the individual
                and community’s health, education and knowledge, and to formulate policies from the discussions. To support
                and facilitate professional and research exchanges as well as extracurricular projects and training for medical
                students, thus introducing them to other cultures and their health problems to improve the medical profession.
            </p>
        </div>
    </section>

    @include('login')
    
@endsection