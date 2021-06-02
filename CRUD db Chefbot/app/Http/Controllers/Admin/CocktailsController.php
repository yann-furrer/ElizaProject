<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cocktail\BulkDestroyCocktail;
use App\Http\Requests\Admin\Cocktail\DestroyCocktail;
use App\Http\Requests\Admin\Cocktail\IndexCocktail;
use App\Http\Requests\Admin\Cocktail\StoreCocktail;
use App\Http\Requests\Admin\Cocktail\UpdateCocktail;
use App\Models\Cocktail;
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

class CocktailsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCocktail $request
     * @return array|Factory|View
     */
    public function index(IndexCocktail $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cocktail::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'url', 'img', 'alcool'],

            // set columns to searchIn
            ['id', 'name', 'url', 'img']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cocktail.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cocktail.create');

        return view('admin.cocktail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCocktail $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCocktail $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Cocktail
        $cocktail = Cocktail::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cocktails'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cocktails');
    }

    /**
     * Display the specified resource.
     *
     * @param Cocktail $cocktail
     * @throws AuthorizationException
     * @return void
     */
    public function show(Cocktail $cocktail)
    {
        $this->authorize('admin.cocktail.show', $cocktail);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cocktail $cocktail
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Cocktail $cocktail)
    {
        $this->authorize('admin.cocktail.edit', $cocktail);


        return view('admin.cocktail.edit', [
            'cocktail' => $cocktail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCocktail $request
     * @param Cocktail $cocktail
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCocktail $request, Cocktail $cocktail)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Cocktail
        $cocktail->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cocktails'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cocktails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCocktail $request
     * @param Cocktail $cocktail
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCocktail $request, Cocktail $cocktail)
    {
        $cocktail->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCocktail $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCocktail $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Cocktail::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
