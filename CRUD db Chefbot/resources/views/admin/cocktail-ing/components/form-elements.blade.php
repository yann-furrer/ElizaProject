<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_cocktail'), 'has-success': fields.id_cocktail && fields.id_cocktail.valid }">
    <label for="id_cocktail" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cocktail-ing.columns.id_cocktail') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_cocktail" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_cocktail'), 'form-control-success': fields.id_cocktail && fields.id_cocktail.valid}" id="id_cocktail" name="id_cocktail" placeholder="{{ trans('admin.cocktail-ing.columns.id_cocktail') }}">
        <div v-if="errors.has('id_cocktail')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_cocktail') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_ingredient'), 'has-success': fields.id_ingredient && fields.id_ingredient.valid }">
    <label for="id_ingredient" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cocktail-ing.columns.id_ingredient') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_ingredient" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_ingredient'), 'form-control-success': fields.id_ingredient && fields.id_ingredient.valid}" id="id_ingredient" name="id_ingredient" placeholder="{{ trans('admin.cocktail-ing.columns.id_ingredient') }}">
        <div v-if="errors.has('id_ingredient')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_ingredient') }}</div>
    </div>
</div>


