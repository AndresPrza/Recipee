<?php 
    use App\Models\User;
?>

@extends('layouts.app')

@section('title', 'PRINCIPAL')

@section('navbar')

    @include('includes.principalNavBar')

@endsection

@section('sidebar')

    @include('includes.principalSideBar')

@endsection

@section('content')

<div style="background-color:var(--mmbr-light-5); height:100%;" class="content flex mx-0 my-0 overflow-auto">
    <div class="content-grid" id="recipes-container">

    <!-- <--- mostrador ---->

        @include('paginate.recipes')

    <!-- <--- mostrador ---->
    </div>
</div>

<script>
    let page = 2
    window.onscroll = () => {

        if( (window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {

            fetch(`/principal/paginate?page=${page}`, {
                method: 'get'
            })
            .then( response => response.text() )
            .then( html => {
                
                document.getElementById("grid-container").innerHTML += html
                page++;
            })
            .catch ( error => console.log ( error ) )
        }
    }

    // keyup

    window.addEventListener("load", function() {
        document.getElementById("searchRecipes").addEventListener("keyup", function() {
            fetch(`principal/search/recipes?searchRecipes=${document.getElementById("searchRecipes").value}`, {
                method:'get'
            })
            .then( response => response.text() )
            .then( html => {
                document.getElementById("recipes-container").innerHTML = html
            })
        })
    })
</script>

@endsection