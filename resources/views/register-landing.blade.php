<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register-landing</title>

    <link rel="stylesheet" href={{ asset('../css/mobile-425px/register-landing.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:wght@500&display=swap"
        rel="stylesheet">
        

</head>

<body>


    <main>
        <h2>Are you a...</h2>
        <div id="btn_ctn">
            <a href="{{ route('register-client') }}"
                class="btn_choice text-sm text-gray-700 dark:text-gray-500 underline">Client?</a>
            <a href="{{ route('register-company') }}"
                class=" btn_choice text-sm text-gray-700 dark:text-gray-500 underline">Company?</a>
        </div>
    </main>


</body>

</html>
