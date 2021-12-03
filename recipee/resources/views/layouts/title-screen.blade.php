<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield ('title') - Recipee </title>

    @include('css.recipee')

</head>

<body>  

<div class="home-header">
    <div class="title-wrapper">
        <h1 class="title-main">@yield('title-main')</h1>
        <h2 class="title-text">
            @yield('title-text')
        </h2>
    </div>
    <a href="{{route('principal')}}" style="right:52%; color:var(--mmbr-dark-3); background-color:var(--mmbr-light-2); border: 2px solid var(--mmbr-light-2);"
    class="text-center py-2 w-36 fixed bottom-3  hvr-grow mmbr-push rounded-xl text-xl font-bold mmbr-ripple-out-light">
            <li class="button-text">
                omitir
            </li>
        </a>
</div>

<div class="home-content">
    @yield('home-content')
</div>

</body>
</html>