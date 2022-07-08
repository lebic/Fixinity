<!DOCTYPE html>

<html>

<head>

    <title>Contact</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css"
        target="_blank" rel="nofollow"
        integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href={{ asset('../css/global.css') }}>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mobile-425px/aboutus.css') }}">



</head>

<body>


    <div id="intro_ctn">
        <a id="return_btn" href="{{ url('/') }}">
            <svg width="4vw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z" />
            </svg>
        </a>


        <h1>About us</h1>
        <h2>What do <span>we</span> do ?</h2>
        <p>YWe are a new startup making life easier for repair companies who have to manage their clients and for
            syndicates who are managing their properties.

        </p>

    </div>
    <div id="team_ctn">
        <h2 id="picture_title">our <span>team</span> </h2>

        <div id="picture_ctn">


            <div class="profil d-flex-ctr-cl">
                <img src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png" alt="">
                <h3>Anthony</h3>
                <p> Lead Front-end <br> developer</p>
            </div>
            <div class="profil d-flex-ctr-cl">
                <img src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png" alt="">
                <h3>Steve</h3>
                <p> Lead Back-end <br> developer</p>
            </div>
            <div class="profil d-flex-ctr-cl">
                <img src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png" alt="">
                <h3>Ashkan</h3>
                <p> Back-end <br> developer</p>
            </div>
            <div class="profil d-flex-ctr-cl">
                <img src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png" alt="">
                <h3>Pit</h3>
                <p> Back-end <br> developer</p>
            </div>
            <div class="profil d-flex-ctr-cl">
                <img src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png" alt="">
                <h3>Stéfano </h3>
                <p> Back-end <br> developer</p>
            </div>

        </div>

    </div>
    <div id="contact_btn_ctn">
        <a href="{{ url('/contact-form') }}" class="btn btn_sm btn_contact d-flex-l">Contact us</a>
    </div>









</body>

</html>
