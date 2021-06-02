<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cocktail.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.cocktail.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('url'), 'has-success': fields.url && fields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cocktail.columns.url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('url'), 'form-control-success': fields.url && fields.url.valid}" id="url" name="url" placeholder="{{ trans('admin.cocktail.columns.url') }}">
        <div v-if="errors.has('url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('img'), 'has-success': fields.img && fields.img.valid }">
    <label for="img" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cocktail.columns.img') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.img" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('img'), 'form-control-success': fields.img && fields.img.valid}" id="img" name="img" placeholder="{{ trans('admin.cocktail.columns.img') }}">
        <div v-if="errors.has('img')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('img') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('alcool'), 'has-success': fields.alcool && fields.alcool.valid }">
    <label for="alcool" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cocktail.columns.alcool') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.alcool" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('alcool'), 'form-control-success': fields.alcool && fields.alcool.valid}" id="alcool" name="alcool" placeholder="{{ trans('admin.cocktail.columns.alcool') }}">
        <div v-if="errors.has('alcool')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('alcool') }}</div>
    </div>
</div>


