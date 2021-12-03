<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class SearchController extends Controller
{
    public function searchIngredients (Request $request) {

        // $term = $request->get('term');

        // $querys = Ingredient::where('ingredient', 'LIKE',  '%'. $term. '%')->get();

        // foreach ($querys as $query) {
        //     $data[] = [
        //         'label' => $query->ingredient 
        //     ];
        // }
        // return $data;

        // $ingvar = Ingredient::where("ingredient", "LIKE", $request->searchingredients."%")->take(10)->get();
        // return view('principal')->with('ingvar', $ingvar);

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>