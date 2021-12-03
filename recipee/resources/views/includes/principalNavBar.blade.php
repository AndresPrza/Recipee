<nav style="color:var(--mmbr-light-5); background-color:var(--mmbr-primary-2)" class="header px-24 pr-1 w-full h-full"> 
        <div class="w-full relative">
            <div class="w-1/6 static left-0">
                <a href="{{ route('principal') }}" class="mmbr-color-hvr text-2xl font-bold" style="line-height:4rem">
                Recipee 
                </a>
            </div>

            <form class="w-1/2 left-64 flex m-auto top-0 absolute mt-3">
                <input  type="text" placeholder="Buscar recetas por nombre" id="searchRecipes" name="searchRecipes" style="color:var(--mmbr-primary-2); background-color:var(--mmbr-light-5)"
                class="w-full py-1 px-3 placeholder-center rounded-xl flex placeholder-gray-500" autocomplete="off">
            </form>

            <ul class="w-1/3 right-10 top-0 absolute flex justify-end" style="line-height:3rem; list-style:none !important;">
            @if(auth()->check())
                <li class="mx-6">
                <p class="text-sm" style="line-height:4.2rem">
                        Bienvenido <b>{{ auth()->user()->name }}</b>
                </p>
                </li>
                <li>
                <a href="{{ route('logIn.destroy') }}" style="color:var(--mmbr-primary-2); background-color:var(--mmbr-light-5); border:2px solid var(--mmbr-primary-2);"
                class="text-xs font-bold py-1 px-2 rounded-xl mmbr-push hvr-grow mmbr-ripple-out-light mt-2">
                    Cerrar Sesión</a> 
                </li>
            @else
                <li class="mx-6">
                <a href="{{ route('logIn') }}" style="color:var(--mmbr-light-5)"
                class="text-xs font-semibold py-1 px-2 rounded-2xl mmbr-push hvr-grow mt-2">
                    Iniciar Sesión</a> 
                </li>
                <li>
                <a href="{{ route('signIn') }}" style="color:var(--mmbr-light-5); background-color:var(--mmbr-primary-2); border:2px solid var(--mmbr-primary-2);"
                class="text-xs font-semibold py-1 px-2 rounded-2xl mmbr-push hvr-grow mmbr-ripple-out-light mt-2">
                    Registrarse</a> 
                </li>
            @endif
            </ul>
        </div>
    </nav>