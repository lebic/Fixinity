<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{ asset('../css/global.css') }}>
    <link rel="stylesheet" href={{ asset('../css/mobile-425px/request-form.css') }}>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- DATE PICKER SCRIPT --}}

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
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
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @isset($message)
                <div class="alert alert-success" style="color: green">
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <h1>Let's Solve Your Problem!</h1>


                <form id="form_ctn" action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="questions_ctn">

                        <h3>What kind of problem do you have?</h3>

                        <div class="input_ctn d-flex-wp" role="group">
                            <label class="label" for="a25">Plumbery</label>
                            <input type="radio" id="a25" name="category" value="plumbery" hidden />


                            <label class="label" for="a30">Maintenance</label>
                            <input type="radio" id="a30" name="category" value="hvac" hidden />


                            <label class="label" for="a35">Electricity</label>
                            <input type="radio" id="a35" name="category" value="electricity" hidden />


                        </div>
                    </div>


                    <div class="questions_ctn">
                        <h3>Where is your problem located?</h3>
                        <div class="input_ctn d-flex-wp" role="group">

                            <label class="label" for="a40">Interior</label>
                            <input type="radio" id="a40" name="situation" value="Interior" hidden />


                            <label class="label" for="a50">Exterior</label>
                            <input type="radio" id="a50" name="situation" value="Exterior" hidden />


                            <label class="label" for="a60">Both</label>
                            <input type="radio" id="a60" name="situation" value="Both" hidden />


                        </div>
                    </div>

                    <div class="questions_ctn">
                        <h3>Give a short title of your problem</h3>
                        <div>
                            <textarea class="input_ctn" name="title" cols="40" rows="4" placeholder="Your problem preview title"></textarea>
                        </div>

                    </div>

                    <div class="questions_ctn">
                        <h3>Explain in details, the problem you encountered:</h3>
                        <div>
                            <textarea class="input_ctn" name="text" cols="40" rows="10"
                                placeholder="Please describe your issue here. The more detailed you are, the faster we can help you."></textarea>
                        </div>

                    </div>




                    <div class="questions_ctn">
                        <h3>Can you take a picture?</h3>
                        <div class="center">
                            <div class="d-flex-ctr-cl">



                                <label id="preview_label" for="profile_picture">Upload your picture</label>
                                <input hidden id="profile_picture" name="image" type="file" :value="old('pictures')"
                                    id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                                <div class="preview_ctn">
                                    <img class="preview_img" width="200vh" id="file-ip-1-preview">
                                </div>

                            </div>

                        </div>

                        <div class="questions_ctn">
                            <h3>When do you need help?</h3>

                            <div class="wrapper">
                                <label class="datepicker_label" for="datepicker">Start date
                                    <input placeholder="JJ/MM/YYYY" name="date" class="datepicker_input" type="text"
                                        id="datepicker" autocomplete="off" :value="old('start_date')">
                                </label>
                                <input class="timepicker" type="text" id="datepicker" autocomplete="off"
                                    :value="old('start_time')">

                            </div>
                        </div>

                        <input id="send_btn" type="submit" name="send" value="SEND">
                </form>
            </div>
        </main>
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

            $(function() {
                // When the value of the radio change
                $('.input_ctn [type="radio"]').on('change', function() {
                    $(this)
                        .prev().addClass('label-hover')
                        .siblings().removeClass('label-hover');
                });
            });

            /*Date picker*/
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: "dd-mm-yy",
                    duration: "fast"
                });
            });

            /*Time picker*/
            $(document).ready(function() {
                $('input.timepicker').timepicker({});
            });
            $('.timepicker').timepicker({
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
    </body>

    </html>
