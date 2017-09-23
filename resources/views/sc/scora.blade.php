@extends('layouts.app')

@section('content')

    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center" style="margin-top: 20px;">
                <h1 class="display-3 img-animated-section2"><b>{{ $title }}</b></h1>
                <br>
                <p class="lead">Sexual & Reproductive Health including HIV/AIDS</p>
            </div>
        </div>
    </header>

    <section class="section-2 section-about container">
        <div class="image-about img-animated-section2" style="text-align: center;">
            <img src="/img/SCORA-1-1.png" alt="CIMSA LOGO" style="height: 150px;">
        </div>
        <br>
        <div class="content-about img-animated-section2">
            <h4 class="lead" style="color:#d00a2c;">
                <span>
                    SCORA ( Standing Commitee on Sexual & Reproductive Health including HIV/AIDS )
                </span>
            </h4>
            <hr>
            <p style="text-align: justify;">
                <span>HISTORY</span><br>SCORA (Standing Commitee on Reproductive Health Including AIDS) exists because so many
                people are living with HIV and AIDS yet very few know the facts about the aforementioned disease. SCORA is
                engaged in the field of sexual and reproductive health, HIV/AIDS, maternal health and many other reproductive
                issues including gender based violance, sexuality and gender identity, as well as sex education for teenager.<br><br>
                <span>GOALS</span><br>1. to raise awareness and knowladge of the community on topics related to HIV/AIDS 
                and sexual and reproductive health. <br>
                2. to facilitate Indonesian medical students to contribute more in the fields of sexual and reproductive health including AIDS <br>
                3. to develop programs in the fields of sexual and reproductive health including AIDS which tackles the nation's conditions. <br>
                4. to create oppurtinities for medical students to act for the betterment of the society's sexual and reproductive health.
                <br><br>
                <span>MISSION</span><br>"<i>To provide necessary tools to advocate for sexual for sexual and reproductive health and rights
                within respective communities in a culturally fashion.</i>"<br><br>
            </p>
        </div>
    </section>

    @include('login')
@endsection