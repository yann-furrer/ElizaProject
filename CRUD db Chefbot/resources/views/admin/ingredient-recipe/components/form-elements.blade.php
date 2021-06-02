<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_food'), 'has-success': fields.name_food && fields.name_food.valid }">
    <label for="name_food" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ingredient-recipe.columns.name_food') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_food" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_food'), 'form-control-success': fields.name_food && fields.name_food.valid}" id="name_food" name="name_food" placeholder="{{ trans('admin.ingredient-recipe.columns.name_food') }}">
        <div v-if="errors.has('name_food')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_food') }}</div>
    </div>
</div>


