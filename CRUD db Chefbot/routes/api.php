<?php

use App\Models\Cocktail;
use App\Models\CocktailIng;
use App\Models\IngredientCocktail;
use App\Models\IngredientRecipe;
use App\Models\Recipe;
use App\Models\RecipeIng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function () {
    return ['messge' => "bienvenue dans l'ap"];
});

//Chemin api qui renvois les plats végatariens 
Route::get('/get_veganfood/{foodlist}', function ($foodlist) {


    $array = explode("%", $foodlist);


    $request = IngredientRecipe::whereIn('name_food', $array)->pluck('id');

    $request2 = RecipeIng::whereIn('id_ingredient', $request)->pluck('id_recipe');
    $request3 = Recipe::whereIn('id', $request2)->where('vegan', 1)->get();
    if (empty($request3[0])) {
        return ['message' => "aucune recette végétarienne trouvé"];
    } else {
        return response()->json($request3);
    }
});

//Chemin api qui renvois les plats non végatariens 
Route::get('/get_noveganfood/{foodlist}', function ($foodlist) {


    $array = explode("%", $foodlist);

    $request = IngredientRecipe::whereIn('name_food', $array)->pluck('id');
    $request2 = RecipeIng::whereIn('id_ingredient', $request)->pluck('id_recipe');


    //Sert à chercher la recette avec le plus de paramètre
    $convert_order_request = array_count_values($request2->toArray());
    $transform_array = collect($convert_order_request)->sort()->reverse()->toArray();
    $res = array_keys($transform_array);

    $request3 = Recipe::whereIn('id', $res)->where('vegan', 0)->get();


  
    if (empty($request3[0])) {
        $empty = array("name" => "acune recette trouvé");
        return  response()->json($empty);
    } else {
        return $request3;
    }
});

//Chemin api qui renvois les coktails sans alcool
Route::get('/get_softdrink/{drinklist}', function ($drinklist) {


    $array = explode("%", $drinklist);


    $request = IngredientCocktail::whereIn('name_drink', $array)->pluck('id');

    $request2 = CocktailIng::whereIn('id_ingredient', $request)->pluck('id_cocktail');

     //Sert à chercher la recette avec le plus de paramètre
     $convert_order_request = array_count_values($request2->toArray());
     $transform_array = collect($convert_order_request)->sort()->reverse()->toArray();
     $res = array_keys($transform_array);
 
     $request3 = Recipe::whereIn('id', $res)->where('vegan', 0)->get();
 
 

    dump($res);
    if (empty($request3[0])) {
        return ['message' => "aucun soft trouvé"];
    } else {
        return response()->json($request3);
    }
});

//Chemin api qui renvois les coktails avec alcool
Route::get('/get_harddrink/{drinklist}', function ($drinklist) {


    $array = explode("%", $drinklist);


    $request = IngredientCocktail::whereIn('name_drink', $array)->pluck('id');
    $request2 = CocktailIng::whereIn('id_ingredient', $request)->get()->pluck('id_cocktail');
    
    //Sert à chercher la recette avec le plus de paramètre
    $convert_order_request = array_count_values($request2->toArray());
    $transform_array = collect($convert_order_request)->sort()->reverse()->toArray();
    $res = array_keys($transform_array);
   

    
    
    $request3 = Cocktail::whereIn('id', $res)->where('alcool', 1)->get();

  

    if (empty($request3[0])) {
        return ['message' => "aucun cocktail trouvé"];
    } else {
        return response()->json($request3);
    }
});


//CHEMIN D'API POUR BOTNATION

//chemin d'api qui botnation pour les recettes végétariennes
Route::get('/get_botvegan/{foodlist}', function ($foodlist) {


    $array = explode("%", $foodlist);


    $request = IngredientRecipe::whereIn('name_food', $array)->pluck('id');

    $request2 = RecipeIng::whereIn('id_ingredient', $request)->pluck('id_recipe');

    //Sert à chercher la recette avec le plus de paramètre
    $convert_order_request = array_count_values($request2->toArray());
    $transform_array = collect($convert_order_request)->sort()->reverse()->toArray();
    $res = array_keys($transform_array);


    $request3 = Recipe::whereIn('id', $res)->where('vegan', 1)->get();
    if (empty($request3[0])) {
        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    'value' => 'aucune recette trouve',
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => 'https://unblast.com/wp-content/uploads/2018/06/404-Website-Page-Template.jpg',
                ),

            )
        );

        return response()->json($foo);
    } else {
        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    'value' => $request3[0]['name'],
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => $request3[0]['img'],
                ),
                2 =>
                array(
                    'type' => 'image',
                    3 =>
                    array(
                        'type' => 'image',
                        'value' => 'temps de preparation: ' . $request3[0]['time'] . " mn",
                    ),
                ),

                2 =>
                array(
                    'type' => 'button',
                    'value' => 'lien recette',
                    'buttons' =>
                    array(
                        0 =>
                        array(
                            'label' => 'recette de ' . $request3[0]['name'],
                            'type' => 'web_url',
                            'ratio' => 'full',
                            'url' => $request3[0]['url'],
                        ),

                    ),
                ),

            )
        );


        return response()->json($foo);
    }
});



//chemin d'api qui botnation pour les recettes non végétariennes
Route::get('/get_botnovegan/{foodlist}', function ($foodlist) {


    $array = explode("%", $foodlist);


    $request = IngredientRecipe::whereIn('name_food', $array)->pluck('id');

    $request2 = RecipeIng::whereIn('id_ingredient', $request)->pluck('id_recipe');

    //Sert à chercher la recette avec le plus de paramètre
    $convert_order_request = array_count_values($request2->toArray());
    $transform_array = collect($convert_order_request)->sort()->reverse()->toArray();
    $res = array_keys($transform_array);
    
    $request3 = Recipe::whereIn('id', $res)->where('vegan', 0)->get();
    if (empty($request3[0])) {

        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    'value' => 'aucune recette trouve',
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => 'https://unblast.com/wp-content/uploads/2018/06/404-Website-Page-Template.jpg',
                ),

            )
        );

        return response()->json($foo);
    } else {
        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    'value' => $request3[0]['name'],
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => $request3[0]['img'],
                ),
                2 =>
                array(
                    'type' => 'image',
                    3 =>
                    array(
                        'type' => 'image',
                        'value' => 'temps de preparation: ' . $request3[0]['time'] . " mn",
                    ),
                ),

                2 =>

                array(
                    'type' => 'button',
                    'value' => 'lien recette',
                    'buttons' =>
                    array(
                        0 =>
                        array(
                            'label' => 'recette de ' . $request3[0]['name'],
                            'type' => 'web_url',
                            'ratio' => 'full',
                            'url' => $request3[0]['url'],
                        ),

                    ),
                ),

            )
        );


        return response()->json($foo);
    }
});

//Chemin api qui renvois les coktails sans alcool
Route::get('/get_softdrink/{drinklist}', function ($drinklist) {


    $array = explode("%", $drinklist);


    $request = IngredientCocktail::whereIn('name_drink', $array)->pluck('id');

    $request2 = CocktailIng::whereIn('id_ingredient', $request)->pluck('id_cocktail');

    //Sert à chercher la recette avec le plus de paramètre
    $convert_order_request = array_count_values($request2->toArray());
    $transform_array = collect($convert_order_request)->sort()->reverse()->toArray();
    $res = array_keys($transform_array);
    
    $request3 = Cocktail::whereIn('id', $res)->where('alcool', 0)->get();
    if (empty($request3[0])) {

        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    'value' => 'aucune recette trouve',
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => 'https://unblast.com/wp-content/uploads/2018/06/404-Website-Page-Template.jpg',
                ),

            )
        );

        return response()->json($foo);
    } else {
        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    'value' => $request3[0]['name'],
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => $request3[0]['img'],
                ),


                2 =>
                array(
                    'type' => 'button',
                    'value' => 'lien cocktail',
                    'buttons' =>
                    array(
                        0 =>
                        array(
                            'label' => 'preparation de ' . $request3[0]['name'],
                            'type' => 'web_url',
                            'ratio' => 'full',
                            'url' => $request3[0]['url'],
                        ),

                    ),
                ),

            )
        );


        return response()->json($foo);
    }
});

//Chemin d'api de botnation pour les recettes avec alcool
Route::get('/get_botharddrink/{drinklist}', function ($drinklist) {
    $array = explode("%", $drinklist);

    $request = IngredientCocktail::whereIn('name_drink', $array)->pluck('id');
    $request2 = CocktailIng::whereIn('id_ingredient', $request)->get()->pluck('id_cocktail');
    
    //Sert à chercher la recette avec le plus de paramètre
    $convert_order_request = array_count_values($request2->toArray());
    $transform_array = collect($convert_order_request)->sort()->reverse()->toArray();
    $res = array_keys($transform_array);
   

    
    
    $request3 = Cocktail::whereIn('id', $res)->where('alcool', 1)->get()->pluck('name');
    dump($convert_order_request);
    dump($res);
    dump($request3);
    if (empty($request3[0])) {

        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    'value' => 'aucune recette trouve',
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => 'https://unblast.com/wp-content/uploads/2018/06/404-Website-Page-Template.jpg',
                ),

            )
        );

        return response()->json($foo);
    } else {
        $foo = array(
            'botnation' => 'v1',
            'reply' =>
            array(
                0 =>
                array(
                    'type' => 'text',
                    // 'value' => "$request3[0]['name']",
                    'value' => "name",
                ),
                1 =>
                array(
                    'type' => 'image',
                    'value' => "IMG",
                    // 'value' => $request3[0]['img'],
                ),


                2 =>
                array(
                    'type' => 'button',
                    'value' => 'lien cocktail',
                    'buttons' =>
                    array(
                        0 =>
                        array(
                            'label' => "ok",
                            // 'label' => 'preparation de ' . $request3[0]['name'],
                            'type' => 'web_url',
                            'ratio' => 'full',
                            // 'url' => $request3[0]['url'],
                        ),

                    ),
                ),

            )
        );


        return response()->json($foo);
    }
});
//FIN DES CHEMINS D'API BOTNATION
