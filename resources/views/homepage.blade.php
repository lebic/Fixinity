<head>
    <title>Homepage</title>
    <link rel="stylesheet" href={{ asset('../css/global.css') }}>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mobile-425px/homepage.css') }}">
</head>

<body>

    <!--HERO SECTION -->

    <section id="hero_ctn">
        <img src="/images/Logo.png" margin="0" width="70%" class="logo" alt="">

        <div class="btn_ctn">
            @if (Route::has('login'))
                <div id="menu">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn dashboard">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn_login">Login</a>

                        @if (Route::has('register-client') || Route::has('register-client'))
                            <a href="{{ route('register-landing') }}" class="btn btn_register">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </section>
    <main>



        <!--INTRO SECTION -->
        <section id="intro_ctn">

            <div class="intro_text">
                <h1>NEED A FIX? <br>
                    <span>We got it</span>
                </h1>
                <p>Have you ever had that question that never got an answer?
                    That question on which you have to spend hours to find the right person to ask for help?
                    we can help you fix your house’s repairs problems!

                    we host a lot of professionnals in all kinds of domains, such as electricity,
                    maintenance,plumbery,...
                    All certified and ready to help you!

                    But how does it works?</p>
            </div>
        </section>


        <!--STEPS-->
        <section id="steps_ctn">

            <div id="steps_content">
                <div class="steps d-flex-row flex-str  ">

                    <img class="number_ctn_left" src="/images/1.png" alt="">

                    <div class="steps_text_right">
                        <h2 class="steps_title_right">CREATE <span>AN <br>account</span></h2>
                        <p class="steps_p_right">To keep track of your request, it would be recommended to have one!
                        </p>
                    </div>
                </div>

                <div class="steps d-flex-row-r ">
                    <img class="number_ctn_right" src="/images/2.png" alt="">
                    <div class="steps_text_left">
                        <h2 class="steps_title_left">Choose <span>a<br>category</span></h2>
                        <p class="steps_p_left">Choose the category related to your house repair</p>
                    </div>
                </div>

                <div class="steps d-flex-row ">
                    <img class="number_ctn_left" src="/images/3.png" alt="">
                    <div class="steps_text_right">
                        <h2 class="steps_title_right">TELL US<br><span>your issue</span></h2>
                        <p class="steps_p_right">Fill a quick form that will target your problem and give a better
                            insight
                        </p>
                    </div>
                </div>

                <div class="steps d-flex-row-r ">
                    <img class="number_ctn_right" src="/images/4.png" alt="">
                    <div class="steps_text_left">
                        <h2 class="steps_title_left">LET US<br> <span>Fix your problem</span></h2>
                        <p class="steps_p_left">Once you send your form, we will find you the best company for your
                            problem.
                            Sit tight and relax!</p>
                        <a href="{{ url('/aboutus') }}" class="btn btn_sm btn_aboutus d-flex-l">About us</a>
                    </div>

                </div>
            </div>
        </section>

        <section>
            <div id="outro">
                <div class="outro_text">
                    <h3> Want to find <br> <span>your solution ?</span> </h3>
                    <p> Register now!
                        Already have an account? <br> you can Log in!</p>
                </div>

                <div class="btn_ctn_end">

                    <div id="menu">
                        <a href="{{ route('login') }}" class="btn btn_login">Login</a>
                        <a href="{{ route('register-landing') }}" class="btn btn_register">Register</a>
                    </div>

                </div>
            </div>
        </section>

    </main>


</body>

</html>
