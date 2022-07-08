<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{ asset('../css/global.css') }}>
    <link rel="stylesheet" href={{ asset('../css/mobile-425px/request-details-client.css') }}>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <main>



        {{-- COMPANY NAME, COMPANY PICTURE, REQUEST NUMBER --}}
        <div id="user_ctn" class="d-flex-row-r">
            <div class="user_text d-flex-cl">
                <h1>Company name </h1>
                <p>Request #5401</p>
            </div>

            <img src="https://www.lightsong.net/wp-content/uploads/2020/12/blank-profile-circle.png" width="50vh"
                height="50vh" alt="">
        </div>
        {{-- Change with "if" for the status of the request (Active, received offer, finished) --}}

        {{-- REQUEST STATUS --}}
        <div id="status_ctn">
            <p> New offer</p>
            <div class="status_line_newoffer">
            </div>
        </div>


        <div id="request_ctn">

            <div class="section_ctn">
                <div class="section_text">
                    <h3>Requests</h3>
                    <p>interior</p>
                </div>

                <div id="problem-ctn">
                    <h4> Problem with sink</h4>
                    <p>Text description. this text can be as long as you want, this is a placeholder.
                    </p>
                </div>

            </div>



            <div class="section_ctn">
                <h3>Request picture</h3>
                <div class="request_img_ctn" class="">
                    <img class="request_img"
                        src="https://images.squarespace-cdn.com/content/54ca69e2e4b0ad8e72da6ffd/1445316081498-R0WZ3VDVVZ2LK76HQHM6/?format=1000w&content-type=image%2Fjpeg"
                        alt="">
                </div>


            </div>

            <div class="section_ctn">
                <h3>Estimated time range</h3>
                <div class="date_ctn">
                    {{-- Start time ( Replace only date to be dynamic) --}}
                    <div class="wrapper">
                        <label class="datepicker_label">From
                            <p class="date"> 22/10/2022</p>
                        </label>
                        <p class="timepicker" id="datepicker">12:20 AM</p>
                    </div>

                    {{-- End time ( Replace only date to be dynamic) --}}
                    <div class="wrapper">
                        <label class="datepicker_label">To
                            <p class="date"> 22/10/2022</p>
                        </label>
                        <p class="timepicker">12:20 AM</p>
                    </div>
                </div>

            </div>

            {{-- Estimated Price for new offer (Change the number (not th €) to be dynamic) --}}

            <div class="section_ctn">
                {{-- Price for finished and active request (Change the number (not th €) to be dynamic) --}}
                <h3>Estimated price</h3>
                {{-- <h3>Price</h3> --}}

                <p id="estimated_price"> 6000€</p>

            </div>






            <div class="section_ctn">
                <div class="btn_ctn">
                    <input class="btn_confirm btn" type="button" name="accept" value="Accept offer">
                    <input class="btn_confirm btn" type="button" name="decline" value="Decline offer">
                </div>

            </div>

        </div>

    </main>


    <x-footer />



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
</body>

</html>
