<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <!-- <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li> -->
            <li class="nav-title">Recette</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/recipes') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.recipe.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/recipe-ings') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.recipe-ing.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ingredient-recipes') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.ingredient-recipe.title') }}</a></li>
           <li class="nav-title">Cocktail</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ingredient-cocktails') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.ingredient-cocktail.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/cocktails') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.cocktail.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/cocktail-ings') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.cocktail-ing.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
