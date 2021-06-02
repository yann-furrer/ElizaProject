<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IngredientRecipe\BulkDestroyIngredientRecipe;
use App\Http\Requests\Admin\IngredientRecipe\DestroyIngredientRecipe;
use App\Http\Requests\Admin\IngredientRecipe\IndexIngredientRecipe;
use App\Http\Requests\Admin\IngredientRecipe\StoreIngredientRecipe;
use App\Http\Requests\Admin\IngredientRecipe\UpdateIngredientRecipe;
use App\Models\IngredientRecipe;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IngredientRecipesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexIngredientRecipe $request
     * @return array|Factory|View
     */
    public function index(IndexIngredientRecipe $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(IngredientRecipe::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name_food'],

            // set columns to searchIn
            ['id', 'name_food']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ingredient-recipe.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ingredient-recipe.create');

        return view('admin.ingredient-recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIngredientRecipe $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreIngredientRecipe $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the IngredientRecipe
        $ingredientRecipe = IngredientRecipe::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ingredient-recipes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ingredient-recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param IngredientRecipe $ingredientRecipe
     * @throws AuthorizationException
     * @return void
     */
    public function show(IngredientRecipe $ingredientRecipe)
    {
        $this->authorize('admin.ingredient-recipe.show', $ingredientRecipe);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param IngredientRecipe $ingredientRecipe
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(IngredientRecipe $ingredientRecipe)
    {
        $this->authorize('admin.ingredient-recipe.edit', $ingredientRecipe);


        return view('admin.ingredient-recipe.edit', [
            'ingredientRecipe' => $ingredientRecipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIngredientRecipe $request
     * @param IngredientRecipe $ingredientRecipe
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateIngredientRecipe $request, IngredientRecipe $ingredientRecipe)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values IngredientRecipe
        $ingredientRecipe->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ingredient-recipes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ingredient-recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyIngredientRecipe $request
     * @param IngredientRecipe $ingredientRecipe
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyIngredientRecipe $request, IngredientRecipe $ingredientRecipe)
    {
        $ingredientRecipe->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyIngredientRecipe $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyIngredientRecipe $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    IngredientRecipe::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
