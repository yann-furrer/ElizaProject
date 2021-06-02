@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.recipe-ing.actions.edit', ['name' => $recipeIng->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <recipe-ing-form
                :action="'{{ $recipeIng->resource_url }}'"
                :data="{{ $recipeIng->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.recipe-ing.actions.edit', ['name' => $recipeIng->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.recipe-ing.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </recipe-ing-form>

        </div>
    
</div>

@endsection