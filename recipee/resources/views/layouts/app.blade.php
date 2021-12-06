<?php
    use App\Models\Ingredient;
    $ingvar = Ingredient::pluck('ingredient')->toArray();
    $jingvar = json_encode($ingvar);
    // dd($jingvar);

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

<script src="{{url('js/addToBasket.js')}}"></script>
<!-- <script type="text/javascript">
    
    window.addEventListener("load", function() {
        
        document.getElementById("addingbutton").addEventListener("click", function() {
            fetch(`principal`, {
                method:'get'
                body: jbasket
            })
            .then( response => response.text() )
            .then( html => {
                document.getElementById("recipes-container").innerHTML = html
            })
        })
    })

</script> -->

</html>