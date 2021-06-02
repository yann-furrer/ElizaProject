<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_recipe'), 'has-success': fields.id_recipe && fields.id_recipe.valid }">
    <label for="id_recipe" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.recipe-ing.columns.id_recipe') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_recipe" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_recipe'), 'form-control-success': fields.id_recipe && fields.id_recipe.valid}" id="id_recipe" name="id_recipe" placeholder="{{ trans('admin.recipe-ing.columns.id_recipe') }}">
        <div v-if="errors.has('id_recipe')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_recipe') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_ingredient'), 'has-success': fields.id_ingredient && fields.id_ingredient.valid }">
    <label for="id_ingredient" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.recipe-ing.columns.id_ingredient') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_ingredient" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_ingredient'), 'form-control-success': fields.id_ingredient && fields.id_ingredient.valid}" id="id_ingredient" name="id_ingredient" placeholder="{{ trans('admin.recipe-ing.columns.id_ingredient') }}">
        <div v-if="errors.has('id_ingredient')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_ingredient') }}</div>
    </div>
</div>


