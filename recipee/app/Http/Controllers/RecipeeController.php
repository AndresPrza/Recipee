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

        // dd($recipes);

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

        $basket=["pollo", "aceite", "ajo", "cebolla", "tomate", "agua", "queso"];

        $users = User::all();

        $recipes = Recipe::where("title", "LIKE", "%" . $request->searchRecipes . "%")->orderBy("created_at", "desc")->get();

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

        $basket=["pollo", "aceite", "ajo", "cebolla", "tomate", "agua", "queso"];

        $users = User::all();

        $recipes = Recipe::where("title", "LIKE", "%" . $request->searchRecipes . "%")->orderBy('id')->get();

        return view('paginate.myRecipes', [
            'ingvar' => $ingvar,
            'recipes' => $recipes,
            'users' => $users
        ]);
    }

    public function paginateRecipes() {
        $ingredients = Ingredient::all();

        foreach ($ingredients as $ingredient) {
            $ingvar[] = "$ingredient->ingredient";
        }

        $users = User::all();

        $recipes = Recipe::where("title", "LIKE", "%" . $request->searchRecipes . "%")->orderBy('updated_at', "desc")->get();

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


    public function addToBasket(Request $request) {
        
    }

}




// sistema de filtrado

// $recipeindex=0;
//         foreach(Recipe::where("title", "LIKE", "%" . $request->searchRecipes . "%")->orderBy('id')->get() as $dbrecipe) {
//             $recipes[$recipeindex] = [
//                 'id' => $dbrecipe->id,
//                 'title' => $dbrecipe->title,
//                 'user_id' => $dbrecipe->user_id,
//                 'content' => $dbrecipe->content,
//                 'thumbnail' => $dbrecipe->thumbnail,
//                 'ingredients_list' => json_decode($dbrecipe->ingredients_list),
//                 'coincidence' => $dbrecipe->coincidence
//                 // 'created_at' => $dbrecipe->created_at,
//                 // 'updated_at' => $dbrecipe->updated_at
//             ];
//             ++$recipeindex;
//         }

//         $recipeindex = 0;
//         foreach($recipes as $recipe) {
            
//             $coincidence = 0;
//             foreach($recipe['ingredients_list'] as $recipe_ingredient) {
//                 foreach($basket as $basket_ingredient) {
//                     if($recipe_ingredient->ingredient == $basket_ingredient) {
//                         $coincidence = $coincidence +1;
//                     }
//                 }
//             }

//             $recipes[$recipeindex]['coincidence'] = $coincidence;

//             $recipeindex++;


//         }



// public function recipeeFilter($array, $key) {

//     foreach($array as $k => $v) {

//         $b[] = strtolower($v->$key);
//     }

//     asort($b);

//     foreach($b as $k => $v) {

//         $c[] = $array[$k];
//     }

//     return $c;
// }