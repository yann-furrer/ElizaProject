<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('recipes')->name('recipes/')->group(static function() {
            Route::get('/',                                             'RecipesController@index')->name('index');
            Route::get('/create',                                       'RecipesController@create')->name('create');
            Route::post('/',                                            'RecipesController@store')->name('store');
            Route::get('/{recipe}/edit',                                'RecipesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RecipesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{recipe}',                                    'RecipesController@update')->name('update');
            Route::delete('/{recipe}',                                  'RecipesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('recipe-ings')->name('recipe-ings/')->group(static function() {
            Route::get('/',                                             'RecipeIngsController@index')->name('index');
            Route::get('/create',                                       'RecipeIngsController@create')->name('create');
            Route::post('/',                                            'RecipeIngsController@store')->name('store');
            Route::get('/{recipeIng}/edit',                             'RecipeIngsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RecipeIngsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{recipeIng}',                                 'RecipeIngsController@update')->name('update');
            Route::delete('/{recipeIng}',                               'RecipeIngsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ingredient-recipes')->name('ingredient-recipes/')->group(static function() {
            Route::get('/',                                             'IngredientRecipesController@index')->name('index');
            Route::get('/create',                                       'IngredientRecipesController@create')->name('create');
            Route::post('/',                                            'IngredientRecipesController@store')->name('store');
            Route::get('/{ingredientRecipe}/edit',                      'IngredientRecipesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'IngredientRecipesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ingredientRecipe}',                          'IngredientRecipesController@update')->name('update');
            Route::delete('/{ingredientRecipe}',                        'IngredientRecipesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ingredient-cocktails')->name('ingredient-cocktails/')->group(static function() {
            Route::get('/',                                             'IngredientCocktailsController@index')->name('index');
            Route::get('/create',                                       'IngredientCocktailsController@create')->name('create');
            Route::post('/',                                            'IngredientCocktailsController@store')->name('store');
            Route::get('/{ingredientCocktail}/edit',                    'IngredientCocktailsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'IngredientCocktailsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ingredientCocktail}',                        'IngredientCocktailsController@update')->name('update');
            Route::delete('/{ingredientCocktail}',                      'IngredientCocktailsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('cocktails')->name('cocktails/')->group(static function() {
            Route::get('/',                                             'CocktailsController@index')->name('index');
            Route::get('/create',                                       'CocktailsController@create')->name('create');
            Route::post('/',                                            'CocktailsController@store')->name('store');
            Route::get('/{cocktail}/edit',                              'CocktailsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CocktailsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cocktail}',                                  'CocktailsController@update')->name('update');
            Route::delete('/{cocktail}',                                'CocktailsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('cocktail-ings')->name('cocktail-ings/')->group(static function() {
            Route::get('/',                                             'CocktailIngsController@index')->name('index');
            Route::get('/create',                                       'CocktailIngsController@create')->name('create');
            Route::post('/',                                            'CocktailIngsController@store')->name('store');
            Route::get('/{cocktailIng}/edit',                           'CocktailIngsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CocktailIngsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cocktailIng}',                               'CocktailIngsController@update')->name('update');
            Route::delete('/{cocktailIng}',                             'CocktailIngsController@destroy')->name('destroy');
        });
    });
});