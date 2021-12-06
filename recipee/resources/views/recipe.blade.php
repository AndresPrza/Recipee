<?php 
    $ingredientslist = json_decode($recipe->ingredients_list, true);
    // dd(json_decode($recipe->ingredients_list, true));
?>

@extends('layouts.app')

@section('title', "$recipe->title")

@section('navbar')

    @include('includes.editorNavBar')

@endsection

@section('sidebar')

    @include('includes.principalSideBar')

@endsection

@section('content')

<div style="background-color:var(--mmbr-light-5); height:100%;" class="content flex mx-0 my-0 overflow-auto">
    <div class="recipe-container">

        <div class="recipe-header">
            <div class="p-2 relative">
                <div class="mmbr-center m-auto w-5/6 px-3">
                    <h1 class="text-3xl font-bold">{{ $recipe->title }}</h1>
                    <p>Por <b>{{ $author->name }}</b></p>
                </div>
            </div>
            <img src="{{ asset($recipe->thumbnail) }}" alt="{{ $recipe->title }}" class="object-cover w-full h-full" style="border-top-right-radius: 18px; border-bottom-right-radius: 18px;">
        </div>

        <div class="ingredients-list">
            <h2 class="text-xl font-bold">
                Ingredientes
            </h2>

            @if ($ingredientslist != "" && $ingredientslist != null)

                @foreach ($ingredientslist as $ingredient)

                <ul id="ingredientsListItem" class="pl-5">
                    <li id="ingredient-name" class="ingredient-name text-base">
                            {{ $ingredient['ingredient'] }}
                    </li>
                        <div>

                        <p id="ingredient-quantity" class="text-sm" style="color:rgba(255, 255, 255, 0.7)">

                        @if( $ingredient['quantity'] != "" && $ingredient['quantity'] != null )
                            ( {{ $ingredient['quantity'] }}
                            @if( $ingredient['unit'] != "" && $ingredient['unit'] != null )
                                {{ $ingredient['unit'] }}
                            @endif
                            )

                        @endif
                            
                        </p>
                        
                        </div>
                        
                </ul>

                @endforeach

            @endif
        </div>

        <div class="recipe-content" >
            <div class="w-full justify-center">
                <h2 class="font-bold text-3xl">Procedimiento</h2>
            </div>

            <div id="" class="recipe-content" style="border-bottom: 2px solid var(--mmbr-dark-3)">
            <?php echo $recipe->content; ?>
            </div>

        </div>

        <div class="recipe-footer">
                <p>
                    
                </p>
        </div>

    </div>
</div>

@endsection