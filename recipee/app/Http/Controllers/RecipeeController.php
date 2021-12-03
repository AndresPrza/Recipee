<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
// use App\Http\Controllers\Admin\UsersController;

class RecipeeController extends Controller
{
    public function start() {


        // $user = User::find(1);
        // dd($user->recipes);

        if(auth()->check()) {

            return redirect()->to('/principal');
        } else {

            return redirect()->to('/home');
        }
    }

    public function home() {
        return view('home');
    }

    public function principal() {
        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }

        $recipes = Recipe::all();
        $users = User::all();

        // dd($recipes);

        return view('principal', [
            'ingvar' => $ingvar,
            'recipes' => $recipes,
            'users' => $users
        ]);
    }

    public function myRecipes() {

        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }

        $recipes = Recipe::where("user_id", auth()->user()->id)->orderBy("created_at", "desc")->get();
        $users = User::all();

        // dd($recipes);

        return view('myRecipes', [
            'ingvar' => $ingvar,
            'recipes' => $recipes,
            'users' => $users
        ]);
    }

    public function searchRecipes(Request $request) {
        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }

        $recipes = Recipe::where("title", "LIKE", "%" . $request->searchRecipes . "%")->get();
        $users = User::all();

        // dd($recipes);

        return view('paginate.recipes', [
            'ingvar' => $ingvar,
            'recipes' => $recipes,
            'users' => $users
        ]);
    }

    public function searchMyRecipes(Request $request) {
        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }

        $recipes = Recipe::where("title", "LIKE", "%" . $request->searchRecipes . "%")->get();
        $users = User::all();

        // dd($recipes);

        return view('paginate.myRecipes', [
            'ingvar' => $ingvar,
            'recipes' => $recipes,
            'users' => $users
        ]);
    }

    public function paginateRecipes() {
        $ingredients = Ingredient::paginate(8);

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }

        $recipes = Recipe::paginate(24);
        $users = User::all();

        return view('paginate.recipes', [
            'ingvar' => $ingvar,
            'recipes' => $recipes,
            'users' => $users
        ]);
    }

    public function admin() {
        $recipes = Recipe::all();
        $categories = Category::all();
        return view('admin.recipes.index', [
        'recipes' => $recipes,
        'categories' => $categories
    ]);
    }

    public function viewRecipe($recipeId) {
        
        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }
        $recipe = Recipe::find($recipeId);
        $author = User::find($recipe->user_id);
        return view ('recipe', [
            'recipe' => $recipe,
            'author' => $author,
            'ingvar' => $ingvar
        ]);
    }

    public function ownerRecipe($recipeId) {
        
        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }
        $recipe = Recipe::find($recipeId);
        $author = User::find($recipe->user_id);
        return view ('ownerRecipe', [
            'recipe' => $recipe,
            'author' => $author,
            'ingvar' => $ingvar
        ]);
    }

    public function editRecipe($recipeId) {
        
        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }
        $recipe = Recipe::find($recipeId);
        $author = User::find($recipe->user_id);
        return view ('editRecipe', [
            'recipe' => $recipe,
            'author' => $author,
            'ingvar' => $ingvar
        ]);
    }

}