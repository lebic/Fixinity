<head>
    <title>Company dashboard (Html/css only )</title>
    <link rel="stylesheet" href={{ asset('../css/global.css') }}>
    <link rel="stylesheet" href={{ asset('../css/mobile-425px/dashboard.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:wght@500&display=swap"
        rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<main>
    <section>
        <?php
        /*         dd($request[0]->profile_picture); */
        ?>
        <div id="profile_ctn">
            {{-- user img --}}
            <img id="profile_picture" src="{{ $user->profile_picture }}" width="350em" height="" />

            {{-- Company name --}}
            <h2>{{ $user->company_name }}</h2>

            {{-- user country --}}
            <p> {{ $user->country }}</p>




            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a id="logout_btn" :href="route('logout')"
                    onclick="event.preventDefault();
                            this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>

        </div>


        {{-- user request's stats --}}
        <h3> Requests </h3>
        <div id="stats_ctn">
            <div class="request-stats_ctn">
                New requests
                <p class="request-stats_nb">{{ $countopen }}</p>
            </div>
            <div class="request-stats_ctn">
                Recived offers
                <p class="request-stats_nb">{{ $countfinished }}</p>
            </div>
            <div class="request-stats_ctn">
                Accepted offers
                <p class="request-stats_nb">{{ $countopen }}</p>
                </p>
            </div>

        </div>


        {{-- List of categories (Active,received offer,finished) --}}

        <div id='categories_ctn'>
            <form class="d-flex-row" action="" method="GET">
                <li><label for="open">New requests</label>
                    <input id="open" hidden type="submit" class="new-request" name="open"></input>
                </li>
                <li>
                    <label for="pending">Sent offers</label>
                    <input id="pending" hidden type="submit"class="active" name="pending"></input>
                </li>
                <li>
                    <label for="finished">Accepted offers</label>
                    <input id="finished" hidden type="submit"class="finished" name="close"></input>
                </li>
            </form>

        </div>



    </section>


    {{-- Categories underline (Active,received offer,finished) --}}

    <div id="line"></div>
    <div id="overline"></div>



    {{-- Showing the right card whenever we click a category name (active, received offer, finished) --}}


    <section>

        {{-- Container for all card, For each needed and replace the text with dynamic ones --}}

        <?php
        
        ?>

        <div name='card' id="card_ctn">

            @if (isset($_GET['open']))

                @foreach ($catrequest as $req)
                    @if ($req->status == 'open')
                        {{-- Container for one card --}}

                        <a id="card" href="/request-details/{{ $req->request_id }}">

                            <div id="card_profile" class="card_profile_active">

                                {{-- Company profile picture --}}



                                <img class="card_img" src="{{ $req->profile_picture }}" width="100em" height="100em"
                                    alt="">

                                <div id="card_profile_text">
                                    {{-- Company name --}}
                                    <h4> {{ $req->first_name }} {{ $req->last_name }}</h4>
                                    {{-- Request type --}}
                                    <h5>{{ $req->categories }} </h5>
                                </div>
                            </div>

                            <div id="card_text">
                                {{-- Request description --}}
                                <p>{{ $req->description }} </p>

                            </div>
                        </a>
                    @endif
                @endforeach
            @endif

            @if (isset($_GET['pending']))
                @foreach ($offers as $req)
                    @if ($req->offerstatus == 'pending')
                        {{-- Container for one card --}}
                        <a id="card" href="/offer-details/{{ $req->offers_id }}">

                            <div id="card_profile" class="card_profile_pending">

                                {{-- Company profile picture --}}



                                <img class="card_img" src="{{ $req->profile_picture }}" width="100em" height="100em"
                                    alt="">

                                <div id="card_profile_text">
                                    {{-- Company name --}}
                                    <h4> {{ $req->first_name }} {{ $req->last_name }}</h4>
                                    {{-- Request type --}}
                                    <h5>{{ $req->title }} </h5>
                                </div>
                            </div>

                            <div id="card_text">
                                {{-- Request description --}}
                                <p>{{ $req->description }}</p>
                                <br>
                                <h4>{{$req->estimated_price}} €</h4>

                            </div>
                        </a>
                    @endif
                @endforeach
            @endif
            @if (isset($_GET['close']))

                @foreach ($offers as $req)
                    @if ($req->offerstatus == 'accepted')
                        {{-- Container for one card --}}
                        <a id="card" href="/request-details/{{ $req->request_id }}">

                            <div id="card_profile" class="card_profile_close">

                                {{-- Company profile picture --}}



                                <img class="card_img" src="{{ $req->profile_picture }}" width="100em" height="100em"
                                    alt="">

                                <div id="card_profile_text">
                                    {{-- Company name --}}
                                    <h4> {{ $req->first_name }}{{ $req->last_name }}</h4>
                                    {{-- Request type --}}
                                    <h5>{{ $req->title }} </h5>
                                </div>
                            </div>

                            <div id="card_text">
                                {{-- Request description --}}
                                <p>{{ $req->description }} {{ $req->estimated_price }} € </p>

                            </div>
                        </a>
                    @endif
                @endforeach
            @endif
            @if (!isset($_GET['open']) && !isset($_GET['pending']) && !isset($_GET['close']))
                @foreach ($catrequest as $req)
                    @if ($req->status == 'open')
                        {{-- Container for one card --}}

                        <a id="card" href="/request-details/{{ $req->request_id }}">

                            <div id="card_profile" class="card_profile_active">

                                {{-- Company profile picture --}}



                                <img class="card_img" src="{{ $req->profile_picture }}" width="100em" height="100em"
                                    alt="">

                                <div id="card_profile_text">
                                    {{-- Company name --}}
                                    <h4> {{ $req->first_name }} {{ $req->last_name }}</h4>
                                    {{-- Request type --}}
                                    <h5>{{ $req->categories }} </h5>
                                </div>
                            </div>

                            <div id="card_text">
                                {{-- Request description --}}
                                <p>{{ $req->description }} </p>

                            </div>
                        </a>
                    @endif
                @endforeach

            @endif
    </section>
</main>

<footer>
    <x-footer />
</footer>



<script>
    $('.active').click(function() {
        $('#overline').css('width', '60%');
    });


    $('.new-request').click(function() {
        $('#overline').css('width', '35%');
    });
    $('.finished').click(function() {
        $('#overline').css('width', '90%');
    });
</script>
