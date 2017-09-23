@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center" style="margin-top: 20px;">
                <h1 class="display-3 img-animated-section2"><b>SCOME</b></h1>
                <br>
                <p class="lead">Medical Education</p>
            </div>
        </div>
    </header>
    <section class="section-2 section-about container">
        <div class="image-about img-animated-section2" style="text-align: center;">
            <img src="/img/logo_scome_rgb.png" alt="CIMSA LOGO" style="height: 150px;">
        </div>
        <br>
        <div class="content-about img-animated-section2">
            <h4 class="lead" style="color:#d00a2c;">
                <span>
                    {{$title}} ( Standing Commitee on Medical Education )
                </span>
            </h4>
            <hr>
            <p style="text-align: justify;">
                <span>HISTORY</span><br>SCOME (Standing Committee on Medical Education ) is one of standing committees that works on development of Indonesia medical
                education's system and also as forum for Indonesian medical student to develop their knowladges and skills in medical field. It is our vision to create 
                a qualified and competitive Medical Human Resources in order to have the ability to face every change in local and global scale. SCOME is commited to do 
                an active effort to support medical students in receiving a comprehensive medical education.<br><br>
                <span>GOALS</span><br>1. To promote medical education system and curriculum's reformation to improve medical education <br>
                2. To increase students, community, policy makers in medical field and government's awareness of the importance of medical education development. <br>
                3. To strenghten the network and resources for medical students in order to establish a qualified health workers. <br>
                4. To expand education and training opportunities for medical students to improve the quality of Indonesia medical resources in the face of changes in local
                and global scale.<br><br>
                <span>MISSION</span><br>"<i>We aim to achive excellance in medical education throughout the world.</i>"<br><br>
            </p>
        </div>
    </section>

    @include('login')
@endsection