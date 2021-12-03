<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecipeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\IngredientsController;
use App\Http\Controllers\SearchController;


// === HOME & PRINCIPAL ===
Route::get('/', [RecipeeController::class,'start'])
    ->name('start');

Route::get('/principal', [RecipeeController::class,'principal'])
    ->name('principal');

Route::get('/principal/search/recipes', [RecipeeController::class,'searchRecipes'])
    ->name('search.recipes');

Route::get('/principal/search/my-recipes', [RecipeeController::class,'searchMyRecipes'])
    ->name('search.my.recipes');

Route::get('/principal/paginate', [RecipeeController::class,'paginateRecipes'])
    ->name('paginate.recipes');

Route::get('/recipe/{recipeId}', [RecipeeController::class,'viewRecipe'])
    ->name('view.recipe');

Route::get('/my-recipes', [RecipeeController::class,'myRecipes'])
    ->middleware('auth')
    ->name('my.recipes');

Route::get('/ownerRecipe/{recipeId}', [RecipeeController::class,'ownerRecipe'])
    ->middleware('auth')
    ->name('owner.recipe');

Route::get('/editRecipe/{recipeId}', [RecipeeController::class,'editRecipe'])
    ->middleware('auth')
    ->name('edit.recipe');

Route::get('/home', [RecipeeController::class,'home'])
    ->middleware('guest')
    ->name('home');

Route::get('/admin', [RecipeeController::class,'admin'])
    ->middleware('auth')
    ->name('admin');

Route::get('/search/ingredients', [SearchController::class,'searchIngredients'])
    ->name('search.ingredients');

Route::get('/search/recipes', [SearchController::class,'searchRecipes'])
    ->name('search.recipes');



// === LOG/SIGN-IN ===

Route::get('/signin', [RegisterController::class,'signIn'])
    ->middleware('guest')
    ->name('signIn');

Route::post('/signin', [RegisterController::class,'store'])
    ->name('register.store');


Route::get('/login', [SessionsController::class,'logIn'])
    ->middleware('guest')
    ->name('logIn');

Route::post('/login', [SessionsController::class,'store'])
    ->name('logIn.store');

Route::get('/logout', [SessionsController::class,'destroy'])
    ->middleware('auth')
    ->name('logIn.destroy');

// === CATEGORÍAS ===

Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class,'index'])
    ->name('admin.categories');

Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class,'store'])
    ->name('admin.categories.store');

Route::post('/admin/categories/{categoryId}/update', [App\Http\Controllers\Admin\CategoriesController::class,'update'])
    ->name('admin.categories.update');

Route::delete('/admin/categories/{categoryId}/delete', [App\Http\Controllers\Admin\CategoriesController::class,'delete'])
    ->name('admin.categories.delete');

// === INGREDIENTES ===

Route::get('/admin/ingredients', [App\Http\Controllers\Admin\IngredientsController::class,'index'])
    ->name('admin.ingredients');

Route::post('/admin/ingredients/store', [App\Http\Controllers\Admin\IngredientsController::class,'store'])
    ->name('admin.ingredients.store');

Route::post('/admin/ingredients/{ingredientId}/update', [App\Http\Controllers\Admin\IngredientsController::class,'update'])
    ->name('admin.ingredients.update');

Route::delete('/admin/ingredients/{ingredientId}/delete', [App\Http\Controllers\Admin\IngredientsController::class,'delete'])
    ->name('admin.ingredients.delete');

// === RECIPES ===

Route::get('/admin/recipes', [App\Http\Controllers\Admin\RecipesController::class,'index'])
    ->name('admin.recipes');

Route::post('/admin/recipes/store', [App\Http\Controllers\Admin\RecipesController::class,'store'])
    ->name('admin.recipes.store');

Route::post('/admin/recipes/{recipeId}/update', [App\Http\Controllers\Admin\RecipesController::class,'update'])
    ->name('admin.recipes.update');

Route::delete('/admin/recipes/{recipeId}/delete', [App\Http\Controllers\Admin\RecipesController::class,'delete'])
    ->name('admin.recipes.delete');