<?php
use Illuminate\Support\Facades\Auth;
$type = Auth::user()->type;
        $checkrole = explode(',', $type);
        
?>
<head>
    <title>Client dashboard (Html/css only )</title>
    <link rel="stylesheet" href={{ asset('../css/global.css') }}>
    <link rel="stylesheet" href={{ asset('../css/mobile-425px/footer.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:wght@500&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>


<footer>
    <ul id="list_ctn" class="d-flex-row">
        <li>
            <a class="icon_ctn" href="{{ route('dashboard') }}"><img class="icon_house" src="images\Icon_house.png"
                    alt=""></a>
        </li>
@if(in_array('client', $checkrole)) 
             <li class="request_btn">
            <a href="{{ route('requests-form') }}"> Send <br> requests</a>
        </li>
@endif
@if(in_array('company', $checkrole)) 
        
        {{-- Uncomment and use this for a dynamic footer --}}
        <li class="request_btn">
            <a href="{{ route('dashboard') }}"> See requests </a>
            </li>
@endif

        <li>
            <a class="icon_ctn" href=""><img class="icon_ecrou" src="images\Icon_ecrou.png" alt=""></a>
        </li>
    </ul>


</footer>
