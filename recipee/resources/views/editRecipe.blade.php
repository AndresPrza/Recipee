
@extends('layouts.editRecipe')

@section('title', "$recipe->title  - EDIT")

@section('navbar')

    @include('includes.editorNavBar')

@endsection

@section('sidebar')

    @include('includes.editorSideBar')

@endsection

@section('content')

<?php
    
?>

<form id="edit-form" method="POST" action="{{route('admin.recipes.update', $recipe->id)}}" enctype="multipart/form-data"
style="background-color:var(--mmbr-light-5); height:100%;" class="content flex mx-0 my-0 overflow-auto">
@csrf
    <div class="recipe-container">

        <div class="recipe-header">
            <div class="p-2 relative">
                <div class="mmbr-center m-auto w-5/6 px-3">
                    <label style="color:rgba(255, 255, 255, 0.8)" class="">Editar título</label>
                    <input type="text" placeholder="Título" name="title" id="recipe" value="{{ $recipe->title }}" required value="{{ $recipe->title }}" autocomplete="off"
                    class=" w-full placeholder-white placeholder-opacity-60 text-3xl font-bold bg-transparent"></input>
                    <br>
                    <label for="thumbnail" class="mr-3">Imagen de portada</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
            </div>

            <script>
                var thumbnailRoute = document.getElementById("thumbnail").value;
            </script>

            <img src="{{ asset($recipe->thumbnail) }}" alt="{{ $recipe->title }}" class="object-cover w-full h-full" style="border-top-right-radius: 18px; border-bottom-right-radius: 18px;">
        </div>

        <div class="ingredients-list">
            <h2 class="text-xl font-bold">
                Ingredientes
            </h2>

            <div class="my-3 ingredientsInput">
                <input type="text" class="ingredientIn" id="ingredientIn" name="ingredientIn" placeholder="ingrediente" autocomplete="off">
                <input type="int" class="quantityIn" id="quantityIn" name="quantityIn" placeholder="cant." autocomplete="off">
                <input type="text" class="unitIn" id="unitIn" name="unitIn" placeholder="unidad" autocomplete="off">
                <button type="button" class="relative mmbr-bg-hvr ingredient-add-in" id="ingredient-add-in">
                    <div class="mmbr-center">
                        <i class="w-full h-full fas fa-plus fa-lg color-current"></i>
                    </div>
                </button>
            </div>
            <div style="background-color:rgba(255, 255, 255, 0.2); width:100%; height:1px;"
            class="mt-2 mb-4"></div>

            <div id="ingredientsListItems"></div>

        </div>
        <div class="recipe-content" >
            <div class="w-full justify-center">
                <h2 class="font-bold text-3xl mb-5">Procedimiento</h2>

                <textarea data-quilljs placeholder="Escriba aquí el procedimiento de su receta..." id="contentInput" name="contentInput" class="rounded-xl placeholder-gray-300">
                    {{ $recipe->content }}
                </textarea>
            </div>

            <!-- <textarea name="content" id="content" required
            style="border:2px solid var(--mmbr-dark-3)" class="flex rounded-md p-2 w-full ">
                {{ $recipe->content }}
            </textarea> -->

        </div>

        <div class="recipe-footer">
            <p>
                    <br><br><br><br><br><br><br>
            </p>
        </div>

        <div class="fixed mt-5 mmbr-save-button mmbr-bg-hvr" style="left:3.3rem; bottom:3.5rem; width:10rem;">
            <button type="submit" class="p-2" id="save-button">
                <!-- <p style="color:rgba(255, 255, 255,0.8)" class="text-sm t-0 l-0">
                    {{$recipe->title}}
                </p> -->
                <p style="" class="pl-3 text-base font-semibold text-white">
                    Guardar receta
                </p>
            </button>
        </div>

        <div class="recipe-footer">
            <p>
                
            </p>
        </div>

    </div>

    
<script src="{{url('js/quill.js')}}"></script>
<script src="{{url('js/quill-textarea.js')}}"></script>

    <script type="text/javascript">

    </script>

</form>

@endsection