<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Recipe\BulkDestroyRecipe;
use App\Http\Requests\Admin\Recipe\DestroyRecipe;
use App\Http\Requests\Admin\Recipe\IndexRecipe;
use App\Http\Requests\Admin\Recipe\StoreRecipe;
use App\Http\Requests\Admin\Recipe\UpdateRecipe;
use App\Models\Recipe;
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

class RecipesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRecipe $request
     * @return array|Factory|View
     */
    public function index(IndexRecipe $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Recipe::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'url', 'img', 'time', 'vegan'],

            // set columns to searchIn
            ['id', 'name', 'url', 'img', 'time']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.recipe.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.recipe.create');

        return view('admin.recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRecipe $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRecipe $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Recipe
        $recipe = Recipe::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/recipes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param Recipe $recipe
     * @throws AuthorizationException
     * @return void
     */
    public function show(Recipe $recipe)
    {
        $this->authorize('admin.recipe.show', $recipe);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Recipe $recipe
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Recipe $recipe)
    {
        $this->authorize('admin.recipe.edit', $recipe);


        return view('admin.recipe.edit', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRecipe $request
     * @param Recipe $recipe
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRecipe $request, Recipe $recipe)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Recipe
        $recipe->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/recipes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRecipe $request
     * @param Recipe $recipe
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRecipe $request, Recipe $recipe)
    {
        $recipe->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRecipe $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRecipe $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Recipe::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
