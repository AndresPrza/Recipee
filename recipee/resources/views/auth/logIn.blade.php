@extends('layouts.title-screen')

@section('title', 'LOG IN')

@section('title-main', 'Recipee')

@section('title-text')

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam egestas tempus velit, 
    sed lacinia sem accumsan ac. Fusce et aliquam felis. Nulla lobortis bibendum purus non aliquam. 
    Sed neque nibh, aliquam non ex eget, mollis dignissim odio. Sed ac finibus risus, a mattis metus. 
    In turpis magna, blandit vitae nunc id, blandit condimentum risus.

@endsection

@section('home-content')
<script>
function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
</script>

    <!--  -->

    <div style="background-color:var(--mmbr-primary-2)" class="mmbr-center rounded-2xl w-2/3 p-4 text-center">

        <p style="color: var(--mmbr-light-2)" class="text-2xl text-center font-bold">Iniciar Sesión</p>

        <form class="mt-3" method="POST" action="">
            @csrf

            <input type="email" style="color: var(--mmbr-primary-1); background-color: var(--mmbr-light-2);" class="w-4/5 p-4 text-lg
            rounded-lg placeholder-gray-500 my-2 mmbr-form font-semibold"
            placeholder="Correo electrónico" id="email" name="email">

            <input type="password" style="color: var(--mmbr-primary-1); background-color: var(--mmbr-light-2);" class="w-4/5 p-4 text-lg
            rounded-lg placeholder-gray-500 my-2 mmbr-form font-semibold"
            placeholder="Contraseña" id="password" name="password">

            <br>
            
            <label style="color: var(--mmbr-light-2)" class="p-3 mt-7 ml-16 text-sm font-semibold">
            <input id="checkbox" style="background-color: var(--mmbrl-light-2); color:var(mmbr-primary-2);" type="checkbox"
            class="form-checkbox rounded-lg"
            onclick="showPassword()"> Mostrar contraseña</label>

            <button type="submit" style="background-color:var(--mmbr-light-2); color:var(--mmbr-primary-2);" 
            class="rounded-xl p-2 mt-2 ml-11 float-left font-bold text-lg static
            hvr-shrink mmbr-ripple-out-light">Ingresar</button>
        </form>

        @error('message')
          <p style="color:var(--mmbr-error-2); background-color:var(--mmbr-dark-3);" class="mx-5 mt-10 p-2 font-semibold text-base rounded-lg">
            {{ $message }}
          </p>
        @enderror

        <br>
        <p style="color:var(--mmbr-light-2)" class="float-right font-semibold text-sm mt-0">¿Aún no tienes una cuenta? 
        <a href="{{ route('signIn') }}" style="color:var(--mmbr-secondary-2); text-decoration:underline;"> créala aquí.</a></p>

    </div>

@endsection