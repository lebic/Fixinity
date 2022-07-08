<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{ asset('../css/global.css') }}>

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

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex-cl h-center fond-offer">
                        <h3>Your estimated time range</h3>

                        <div>
                            <div class="wrapper">
                                <label class="datepicker_label" for="datepicker">From
                                    <input placeholder="DD/MM/YYYY" class="datepicker_input" type="text"
                                        id="datepicker" autocomplete="off" :value="old('start_date')">
                                </label>
                                <input placeholder="HH:MM" class="timepicker-newoffer" type="text" id="datepicker"
                                    autocomplete="off" :value="old('start_time')">
                            </div>

                            <div class="wrapper">
                                <label class="datepicker_label" for="datepicker2">To
                                    <input placeholder="DD/MM/YYYY" class="datepicker_input" type="text"
                                        id="datepicker2" autocomplete="off" :value="old('end_date')">
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
                        <input class="btn_confirm btn" type="button" name="decline request" value="Decline offer">
                    </div>
                </form>

            </div>

        </div>
    </main>
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
