@extends('layouts.title-screen')

@section('title', 'HOME')

@section('title-main', 'Recipee')

@section('title-text')

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam egestas tempus velit, 
    sed lacinia sem accumsan ac. Fusce et aliquam felis. Nulla lobortis bibendum purus non aliquam. 
    Sed neque nibh, aliquam non ex eget, mollis dignissim odio. Sed ac finibus risus, a mattis metus. 
    In turpis magna, blandit vitae nunc id, blandit condimentum risus.

@endsection

@section('home-content')

    <div class="home-buttons-wrapper">
        <a href="{{route('logIn')}}" class="home-login-button hvr-grow mmbr-ripple-out mmbr-push">
            <li class="button-text">
                Iniciar sesión
            </li>
        </a>
        <a href="{{route('signIn')}}" class="home-signin-button hvr-grow mmbr-ripple-out mmbr-push">
            <li class="button-text">
                Registrarse
            </li>
        </a>
    </div>

@endsection