<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Recipe::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Recipe::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'url' => $faker->sentence,
        'img' => $faker->sentence,
        'time' => $faker->sentence,
        'vegan' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Recipe::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'url' => $faker->sentence,
        'img' => $faker->sentence,
        'alcool' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\RecipeIng::class, static function (Faker\Generator $faker) {
    return [
        'id_recipe' => $faker->randomNumber(5),
        'id_ingredient' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\IngredientRecipe::class, static function (Faker\Generator $faker) {
    return [
        'name_food' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\IngredientCocktail::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cocktail::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'url' => $faker->sentence,
        'img' => $faker->sentence,
        'alcool' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\IngredientCocktail::class, static function (Faker\Generator $faker) {
    return [
        'name_drink' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CocktailIng::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CocktailIng::class, static function (Faker\Generator $faker) {
    return [
        'id_cocktail' => $faker->randomNumber(5),
        'id_ingredient' => $faker->randomNumber(5),
        
        
    ];
});
