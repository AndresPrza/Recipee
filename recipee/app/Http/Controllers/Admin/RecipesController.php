<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\User;

class RecipesController extends Controller
{
    public function __construct () {

        $this->middleware('auth');
   }

   public function index () {

    $recipes = Recipe::all();
    $categories = Category::all();
    return view('admin.recipes.index', [
        'recipes' => $recipes,
        'categories' => $categories
    ]);
   }

   public function store (Request $request) {

    $newRecipe = new Recipe();

    // dd($request->content);

        $file = $request->file('thumbnail');
        $destinationPath = "images/thumbnails/";
        $filename = time().'-'.$file->getClientOriginalName();
        $uploadSuccess =$request->file('thumbnail')->move($destinationPath, $filename);
        $newRecipe->thumbnail = $destinationPath.$filename;

    $newRecipe->title = $request->title;
    $newRecipe->content = $request->content;
    $newRecipe->user_id = auth()->user()->id;
    $newRecipe->save();

    return redirect()->back();
   }

   public function update (Request $request, $recipeId) {

    $recipe = Recipe::find($recipeId);
    // dd($request);

    if( $request->hasFile('thumbnail') ) {

        $file = $request->file('thumbnail');
        $destinationPath = "images/thumbnails/";
        $filename = time().'-'.$file->getClientOriginalName();
        $uploadSuccess =$request->file('thumbnail')->move($destinationPath, $filename);
        $recipe->thumbnail = $destinationPath.$filename;
    }

    $recipe->title = $request->title;
    $recipe->content = $request->contentInput;
    // $recipe->ingredients_list = $ingredientsList;
    $recipe->save();

    return redirect()->route('owner.recipe', $recipe->id);
    }
}
