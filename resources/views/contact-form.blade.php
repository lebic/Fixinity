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
    <link rel="stylesheet" type="text/css" href="{{ asset('../css/mobile-425px/contact.css') }}">



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
        <h1>Contact us</h1>
        <h2>do you want to <br> contact <span>us</span>?</h2>
        <p>You can use This form for any questions or business inquiries you might have, we will be happy to answer
            them!</p>
    </div>



    <div id="form_ctn">



        @if (Session::has('success'))
            <div class="alert alert-success">

                {{ Session::get('success') }}

                @php
                    
                    Session::forget('success');
                    
                @endphp

            </div>
        @endif



        <form method="POST" action="{{ route('contact-form.store') }}">



            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">



                        <input type="text" name="first_name" class="form-control text-ow border-ow input-ow"
                            placeholder="First name" value="{{ old('first_name') }}">

                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif

                    </div>

                </div>
                <div class="col-md-6">

                    <div class="form-group">



                        <input type="text" name="last_name" class="form-control text-ow border-ow input-ow"
                            placeholder="Last name" value="{{ old('last_name') }}">

                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">


                        <input type="text" name="email" class="form-control text-ow border-ow input-ow"
                            placeholder="Email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                    </div>

                </div>





                <div class="col-md-6">

                    <div class="form-group">


                        <input type="text" name="subject" class="form-control text-ow border-ow input-ow"
                            placeholder="Subject" value="{{ old('subject') }}">

                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>

                </div>



                <div class="col-md-12">

                    <div class="form-group">



                        <textarea placeholder="Your message"name="message" rows="5" class="form-control text-ow border-ow input-ow">{{ old('message') }}</textarea>

                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif

                        <div id="send_ctn">


                            <x-button id="send_btn">Send</x-button>

                        </div>
                    </div>



                </div>



                <div>
        </form>


    </div>





</body>

</html>
