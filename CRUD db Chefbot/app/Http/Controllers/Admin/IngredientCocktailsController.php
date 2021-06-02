<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IngredientCocktail\BulkDestroyIngredientCocktail;
use App\Http\Requests\Admin\IngredientCocktail\DestroyIngredientCocktail;
use App\Http\Requests\Admin\IngredientCocktail\IndexIngredientCocktail;
use App\Http\Requests\Admin\IngredientCocktail\StoreIngredientCocktail;
use App\Http\Requests\Admin\IngredientCocktail\UpdateIngredientCocktail;
use App\Models\IngredientCocktail;
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

class IngredientCocktailsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexIngredientCocktail $request
     * @return array|Factory|View
     */
    public function index(IndexIngredientCocktail $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(IngredientCocktail::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name_drink'],

            // set columns to searchIn
            ['id', 'name_drink']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ingredient-cocktail.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ingredient-cocktail.create');

        return view('admin.ingredient-cocktail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIngredientCocktail $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreIngredientCocktail $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the IngredientCocktail
        $ingredientCocktail = IngredientCocktail::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ingredient-cocktails'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ingredient-cocktails');
    }

    /**
     * Display the specified resource.
     *
     * @param IngredientCocktail $ingredientCocktail
     * @throws AuthorizationException
     * @return void
     */
    public function show(IngredientCocktail $ingredientCocktail)
    {
        $this->authorize('admin.ingredient-cocktail.show', $ingredientCocktail);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param IngredientCocktail $ingredientCocktail
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(IngredientCocktail $ingredientCocktail)
    {
        $this->authorize('admin.ingredient-cocktail.edit', $ingredientCocktail);


        return view('admin.ingredient-cocktail.edit', [
            'ingredientCocktail' => $ingredientCocktail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIngredientCocktail $request
     * @param IngredientCocktail $ingredientCocktail
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateIngredientCocktail $request, IngredientCocktail $ingredientCocktail)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values IngredientCocktail
        $ingredientCocktail->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ingredient-cocktails'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ingredient-cocktails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyIngredientCocktail $request
     * @param IngredientCocktail $ingredientCocktail
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyIngredientCocktail $request, IngredientCocktail $ingredientCocktail)
    {
        $ingredientCocktail->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyIngredientCocktail $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyIngredientCocktail $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    IngredientCocktail::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
