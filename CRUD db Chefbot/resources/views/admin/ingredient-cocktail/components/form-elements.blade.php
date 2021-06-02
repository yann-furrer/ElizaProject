<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_drink'), 'has-success': fields.name_drink && fields.name_drink.valid }">
    <label for="name_drink" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ingredient-cocktail.columns.name_drink') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_drink" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_drink'), 'form-control-success': fields.name_drink && fields.name_drink.valid}" id="name_drink" name="name_drink" placeholder="{{ trans('admin.ingredient-cocktail.columns.name_drink') }}">
        <div v-if="errors.has('name_drink')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_drink') }}</div>
    </div>
</div>


