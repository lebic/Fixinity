<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{ asset('../css/global.css') }}>
    <link rel="stylesheet" href={{ asset('../css/mobile-425px/request-details-company.css') }}>
    <link rel="stylesheet" href={{ asset('../css/mobile-425px/request-form.css') }}>
    <link rel="stylesheet" href={{ asset('../css/mobile-425px/new-offer.css') }}>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        {{-- DATE PICKER SCRIPT --}}

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
                integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <main>
     


        {{-- COMPANY NAME, COMPANY PICTURE, REQUEST NUMBER --}}
        <?php

        ?>
        <div id="user_ctn" class="d-flex-row-r">
            <div class="user_text d-flex-cl">
                <h1>{{$client->first_name}} {{$client->last_name}} </h1>
                <p>Request #{{$request->id}}</p>
            </div>

            <img src="{{$client->profile_picture}}" width="50vh"
                height="50vh" alt="">
        </div>


        {{-- REQUEST STATUS --}}
        @if($request->status=='open')

        <div id="status_ctn">
            <p>New request</p>
            <div class="status_line_newoffer">
            </div>
        </div>
        @endif
        @if($request->status=='pending')

        <div id="status_ctn">
            <p>Sent offers</p>
            <div class="status_line_active">
            </div>
        </div>
        @endif
        @if($request->status=='close')

        <div id="status_ctn">
            <p>Accepted offers</p>
            <div class="status_line_solved">
            </div>
        </div>
        @endif


        <div id="request_ctn">

            <div class="section_ctn">
                <div class="section_text">
                    <h3>Requests</h3>
                    {{-- make "interior/exterior" dynamic --}}

                    <p>{{$request->type}}</p>
                </div>

                <div id="problem-ctn">
                    <h4> {{$request->title}}</h4>
                    <p>{{$request->description}}</p>
                </div>

            </div>



            <div class="section_ctn">
                <h3>Request picture</h3>
                <div class="request_img_ctn" class="">
                    <img class="request_img"
                        src="{{$request->pictures}}"
                        alt="">
                </div>


            </div>

            {{-- FOR NEW REQUEST ONLY, HIDE FOR OTHER STATUS --}}
            @if ($request->status == 'open')
            <div class="section_ctn">
                <h3>Client disponibility</h3>
                <div class="date_ctn">
                    {{-- Start time ( Replace only date to be dynamic) --}}
                    <div class="wrapper">
                        <label class="datepicker_label">From
                            <p class="date">{{$request->date}}</p>
                        </label>
                        <p class="timepicker" id="datepicker">12:20 AM</p>
                    </div>

                </div>

            </div>
@endif

            {{-- FOR "ACTIVE" AND "FINISHED" ONLY, HIDE FOR "NEW REQUESTS" --}}
@if($request->status !=="open")
            <div class="section_ctn">
                <h3>Time range</h3>
                <div class="date_ctn">
                    {{-- Start time ( Replace only date to be dynamic) --}}
                    <div class="wrapper">
                        <label class="datepicker_label">From
                            <p class="date"> 22/10/2022</p>
                        </label>
                        <p class="timepicker" id="datepicker">12:20 AM</p>
                    </div>
                    <div class="wrapper">
                        <label class="datepicker_label">To
                            <p class="date"> 22/10/2022</p>
                        </label>
                        <p class="timepicker" id="datepicker">12:20 AM</p>
                    </div>

                </div>

            </div>


          
            {{-- ----------------------------------------------------------- --}}


            {{-- FOR "ACTIVE" AND "FINISHED" ONLY, HIDE FOR "NEW REQUEST" --}}
            <div class="section_ctn">
                <h3>price</h3>

                <p id="estimated_price"> 6000€</p>

            </div>
  @endif
  @if($request->status =="open")
            {{-- FOR "NEW OFFER" ONLY,HIDE FOR "ACTIVE","FINISHED" --}}
            
        <div class="flex">
            @if (session('success'))
                <div class="alert alert-success" style="color: green">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-success" style="color: red">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="section_newoffer_ctn">

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
               
                    <div class="d-flex-cl h-center fond-offer">
                        <h3>Your estimated time range</h3>

                        <div>
                            <div class="wrapper">
                                <label class="datepicker_label" for="datepicker">From
                                    <input placeholder="DD/MM/YYYY" class="datepicker_input" type="text"
                                        id="datepicker" 
                                        name="estimated_start_time" autocomplete="off" :value="old('estimated_start_time')">
                                </label>
                                <input placeholder="HH:MM" class="timepicker-newoffer" type="text" id="datepicker"
                                    autocomplete="off" :value="old('start_time')">
                            </div>

                            <div class="wrapper">
                                <label class="datepicker_label" for="datepicker2">To
                                    <input placeholder="DD/MM/YYYY" class="datepicker_input" type="text"
                                        id="datepicker2" 
                                        name="estimated_end_time" autocomplete="off" :value="old('estimated_end_time')">
                                </label>
                                <input placeholder="HH:MM" class="timepicker-newoffer" type="text" id="datepicker2"
                                    autocomplete="off" :value="old('end_time')">
                            </div>

                        </div>
                        <div>
                            <h3>Your estimated price</h3>
                            <div class="price_ctn">
                                <input placeholder="xxxxxxx" type="number" name="estimated_price" id="estimated_price">
                                <p>€</p>
                            </div>

                        </div>


                    </div>

                    <div class="btn_ctn">
                        <input class="btn_confirm btn" type="submit" name="accept" value="make offer">
                        <input class="btn_confirm btn" type="button" name="decline request" value="Ignore">
                    </div>
                </form>

            </div>

        </div>
@endif
@if($request->status =="pending")

            {{-- FOR "ACTIVE" ONLY, HIDE FOR THE OTHERS STATUS --}}
            <form action="/finished" method="post" enctype="multipart/form-data">
                @csrf

            <div class="btn_ctn ">
                <input class="btn_confirm  btn" type="submit" name="mark-as-finished" value="mark as finished">
            </div>
            </form>
            @endif
        </div>

    </main>


    <x-footer />

    <script>
        /*Date picker*/
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                duration: "fast"
            });
        });
        $(function() {
            $("#datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                duration: "fast"
            });
        });
        $('.timepicker-newoffer').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '0',
            maxTime: '6:00pm',
            defaultTime: 'now',
            startTime: '8:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    </script>

    <script type="text/javascript">
        /*Preview img*/
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";

            }
        }

        // Expand image
        $(function() {
            $('.request_img').click(function() {
                $(this).toggleClass('biggerImg')
            });
        });
    </script>
     <script>
         /*Date picker*/

         $(function() {
             $("#datepicker").datepicker({
                 dateFormat: "dd-mm-yy",
                 duration: "fast"
             });
         });
         $(function() {
             $("#datepicker2").datepicker({
                 dateFormat: "dd-mm-yy",
                 duration: "fast"
             });
         });
         $('.timepicker-newoffer').timepicker({
             timeFormat: 'h:mm p',
             interval: 60,
             minTime: '0',
             maxTime: '6:00pm',
             defaultTime: 'now',
             startTime: '8:00',
             dynamic: true,
             dropdown: true,
             scrollbar: true
         });
     </script>
     <script type="text/javascript">
         /*Time picker*/
         $(document).ready(function() {
             $('input.timepicker').timepicker({});
         });
 
 
         // Expand image
         $(function() {
             $('.preview_img').click(function() {
                 $(this).toggleClass('biggerImg')
             });
         });
     </script>
</body>

</html>
