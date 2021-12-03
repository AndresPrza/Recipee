<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientsController extends Controller
{
    public function __construct () {

        $this->middleware('auth');
   }

   public function index () {

    $ingredients = Ingredient::all();
    return view('admin.ingredients.index', [
        'ingredients' => $ingredients
    ]);
   }

   public function store (Request $request) {

    $newIngredient = new Ingredient();

    $newIngredient->ingredient = $request->ingredient;
    $newIngredient->save();

    return redirect()->back();
   }

   public function update (Request $request, $ingredientId) {

    $ingredient = Ingredient::find($ingredientId);

    $ingredient->ingredient = $request->ingredient;
    $ingredient->save();

    return redirect()->back();
    }

    public function delete (Request $request, $ingredientId) {

        $ingredient = Ingredient::find($ingredientId);
        $ingredient->delete();
    
        return redirect()->back();
       }
}
