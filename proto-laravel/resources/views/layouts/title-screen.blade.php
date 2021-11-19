<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield ('title') - Prototype</title>

    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/hovers.css')}}">

</head>

<body>  

<div class="home-header">
    <div class="title-wrapper">
        <h1 class="title-main">@yield('title-main')</h1>
        <h2 class="title-text">
            @yield('title-text')
        </h2>
    </div>
</div>
<div class="home-content">
    @yield('home-content')
</div>

</body>
</html>