@extends('layouts.app')

@section('content')

    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center" style="margin-top: 20px;">
                <h1 class="display-3 img-animated-section2"><b>SCOPE</b></h1>
                <br>
                <p class="lead">Professional Exchange</p>
            </div>
        </div>
    </header>

    <section class="section-2 section-about container">
        <div class="image-about img-animated-section2" style="text-align: center;">
            <img src="/img/logo_scope_rgb.png" alt="CIMSA LOGO" style="height: 150px;">
        </div>
        <br>
        <div class="content-about img-animated-section2">
            <h4 class="lead" style="color:#d00a2c;">
                <span>
                    SCOPE ( Standing Commitee on Professional Exchange )
                </span>
            </h4>
            <hr>
            <p style="text-align: justify;">
                <span>HISTORY</span><br>SCOPE (Standing Commitee on Professional Exchange) facilitates all medical students who want to have an experience
                in medical fields abroad through Professional Exchange program. The Professional Exchange program is a full educational program offering 
                clerkships to medical students abroad. Annually, more than 13.000 students from 90 countries travel around the world to discover new health
                systems, new cultures and to enhance their global health and intercultural understanding.<br><br>
                <span>GOALS</span><br>1. To increase the mobility and to widen the horizon of medical students worldwide; <br> 2, To provide medical students 
                with the possibility to experience healthcare in another culture with different health and education systems, and to learn how differences in culture
                and believes are of influence.<br>
                3. To create possibilities for medical students to learn about global health issues, primary health concerns and basic epidemiology of the host country
                , and how it differs from their home country;<br>
                4. To contribute to the education of a future health professionals with a global vision and to contribute to medical students personal development, self-reliance
                and openness in becoming future health proffesionals; <br>
                5. To provide students with the chance to improve their medical knowladge, their vision on medical issues and their practical knowladge depending on the regulations
                of the host country;<br>
                6. To facilitate the connection of medical students and other health professionals and to provide a platform for future coorperation amongst medical students
                with each other and with health professionals across the globe; <br>
                7. To maintain affordable professional exchange tuition through its governing body to ensure that medical students within the National Member Organizations can participate
                in the exchanges with a minimal financial burden; <br>
                8. To make sure students are aware of ethical aspects regarding their exchange to assure the burden on society, patients, the resources and the healthcare system
                is as limited as possible; <br>
                9. To promote tolerance towards differences and similarities within health and towards patients regardless of their sex, religion, or believes.<br><br>
                <span>MISSION</span><br>"<i>To promote cultural understanding and co-operation amongst medical students and all health professionals through the facilitation of international
                    student exchanges. Also, to give all students the opportunity to learn about global health, and attains this partly by having its exchanges accredited by medical facilities
                accross the world.</i>"<br><br>
            </p>
        </div>
    </section>

    @include('login')
@endsection