<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RecipeIng\BulkDestroyRecipeIng;
use App\Http\Requests\Admin\RecipeIng\DestroyRecipeIng;
use App\Http\Requests\Admin\RecipeIng\IndexRecipeIng;
use App\Http\Requests\Admin\RecipeIng\StoreRecipeIng;
use App\Http\Requests\Admin\RecipeIng\UpdateRecipeIng;
use App\Models\RecipeIng;
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

class RecipeIngsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRecipeIng $request
     * @return array|Factory|View
     */
    public function index(IndexRecipeIng $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RecipeIng::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id_recipe', 'id_ingredient'],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.recipe-ing.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.recipe-ing.create');

        return view('admin.recipe-ing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRecipeIng $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRecipeIng $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RecipeIng
        $recipeIng = RecipeIng::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/recipe-ings'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/recipe-ings');
    }

    /**
     * Display the specified resource.
     *
     * @param RecipeIng $recipeIng
     * @throws AuthorizationException
     * @return void
     */
    public function show(RecipeIng $recipeIng)
    {
        $this->authorize('admin.recipe-ing.show', $recipeIng);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RecipeIng $recipeIng
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RecipeIng $recipeIng)
    {
        $this->authorize('admin.recipe-ing.edit', $recipeIng);


        return view('admin.recipe-ing.edit', [
            'recipeIng' => $recipeIng,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRecipeIng $request
     * @param RecipeIng $recipeIng
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRecipeIng $request, RecipeIng $recipeIng)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RecipeIng
        $recipeIng->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/recipe-ings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/recipe-ings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRecipeIng $request
     * @param RecipeIng $recipeIng
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRecipeIng $request, RecipeIng $recipeIng)
    {
        $recipeIng->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRecipeIng $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRecipeIng $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RecipeIng::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
