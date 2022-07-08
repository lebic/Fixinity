 <head>
     <title>Client dashboard (Html/css only )</title>
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
         <div id="profile_ctn">
             {{-- user img --}}
             <div id="profile_picture">
                 <img src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png"
                     height="350em" />
             </div>


             {{-- user name --}}
             <h2>Jeanne</h2>

             {{-- user country --}}
             <p> Luxembourg</p>



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
                 Active requests
                 <p class="request-stats_nb">41</p>
             </div>
             <div class="request-stats_ctn">
                 Finished requests
                 <p class="request-stats_nb">41</p>
             </div>
             <div class="request-stats_ctn">
                 Received requests
                 <p class="request-stats_nb">41</p>
             </div>

         </div>





         {{-- List of categories (Active,received offer,finished) --}}

         <div id='categories_ctn'>

             <li><a class="active" href="#">Active</a></li>
             <li><a class="offer" href="#">Received offer</a></li>
             <li><a class="finished" href="#">Finished</a></li>

         </div>



     </section>


     {{-- Categories underline (Active,received offer,finished) --}}

     <div id="line"></div>
     <div id="overline"></div>



     {{-- Showing the right card whenever we click a category name (active, received offer, finished) --}}


     <section>

         {{-- Container for all card, For each needed and replace the text with dynamic ones --}}

         <div id="card_ctn">

             {{-- Container for one card --}}
             <div id="card">

                 <div id="card_profile">

                     {{-- Company profile picture --}}
                     <img class="card_img"
                         src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png"
                         width="100em" height="100em" alt="">

                     <div id="card_profile_text">
                         {{-- Company name --}}
                         <h4> Confortsama</h4>
                         {{-- Request type --}}
                         <h5>Plumbery </h5>
                     </div>
                 </div>

                 <div id="card_text">
                     {{-- Request description --}}
                     <p>Problem with sink, and the tap, it is not working properly... </p>
                 </div>
             </div>

             {{-- Container for one card --}}
             <div id="card">

                 <div id="card_profile">

                     {{-- Company profile picture --}}
                     <img class="card_img"
                         src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png"
                         width="100em" height="100em" alt="">

                     <div id="card_profile_text">
                         {{-- Company name --}}
                         <h4> Magneto </h4>
                         {{-- Request type --}}
                         <h5>Electricity</h5>
                     </div>
                 </div>

                 <div id="card_text">
                     {{-- Request description --}}
                     <p>I have no electricity, help... </p>
                 </div>
             </div>


         </div>

     </section>
 </main>

 <footer>
     <x-footer />
 </footer>



 <script>
     $('.active').click(function() {
         $('#overline').css('width', '30%');
     });


     $('.offer').click(function() {
         $('#overline').css('width', '60%');
     });
     $('.finished').click(function() {
         $('#overline').css('width', '85%');
     });
 </script>
