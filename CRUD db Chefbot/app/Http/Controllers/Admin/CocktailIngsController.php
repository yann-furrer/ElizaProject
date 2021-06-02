<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CocktailIng\BulkDestroyCocktailIng;
use App\Http\Requests\Admin\CocktailIng\DestroyCocktailIng;
use App\Http\Requests\Admin\CocktailIng\IndexCocktailIng;
use App\Http\Requests\Admin\CocktailIng\StoreCocktailIng;
use App\Http\Requests\Admin\CocktailIng\UpdateCocktailIng;
use App\Models\CocktailIng;
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

class CocktailIngsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCocktailIng $request
     * @return array|Factory|View
     */
    public function index(IndexCocktailIng $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CocktailIng::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id_cocktail', 'id_ingredient'],

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

        return view('admin.cocktail-ing.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cocktail-ing.create');

        return view('admin.cocktail-ing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCocktailIng $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCocktailIng $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CocktailIng
        $cocktailIng = CocktailIng::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cocktail-ings'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cocktail-ings');
    }

    /**
     * Display the specified resource.
     *
     * @param CocktailIng $cocktailIng
     * @throws AuthorizationException
     * @return void
     */
    public function show(CocktailIng $cocktailIng)
    {
        $this->authorize('admin.cocktail-ing.show', $cocktailIng);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CocktailIng $cocktailIng
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CocktailIng $cocktailIng)
    {
        $this->authorize('admin.cocktail-ing.edit', $cocktailIng);


        return view('admin.cocktail-ing.edit', [
            'cocktailIng' => $cocktailIng,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCocktailIng $request
     * @param CocktailIng $cocktailIng
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCocktailIng $request, CocktailIng $cocktailIng)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CocktailIng
        $cocktailIng->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cocktail-ings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cocktail-ings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCocktailIng $request
     * @param CocktailIng $cocktailIng
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCocktailIng $request, CocktailIng $cocktailIng)
    {
        $cocktailIng->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCocktailIng $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCocktailIng $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CocktailIng::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
