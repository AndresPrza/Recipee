<?php
    
?>

<!DOCTYPE html>
<html lang="en" style="width:100vw;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield ('title') - Recipee</title>

    @include('css.recipee')

    <style>
        /* body {display:none;} */
    </style>

</head>

<body class="mmbr-bg grid-container fixed bottom-0 top-0 left-0 right-0" style="width:100vw; overflow-x:hidden; overflow-y:auto;">

    @yield('navbar')

    @yield('sidebar')
     
    @yield('content')

    @include('js.recipee')

</body>

</html>