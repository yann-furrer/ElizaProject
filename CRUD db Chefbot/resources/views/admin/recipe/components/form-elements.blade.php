<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.recipe.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.recipe.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('url'), 'has-success': fields.url && fields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.recipe.columns.url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('url'), 'form-control-success': fields.url && fields.url.valid}" id="url" name="url" placeholder="{{ trans('admin.recipe.columns.url') }}">
        <div v-if="errors.has('url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('img'), 'has-success': fields.img && fields.img.valid }">
    <label for="img" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.recipe.columns.img') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.img" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('img'), 'form-control-success': fields.img && fields.img.valid}" id="img" name="img" placeholder="{{ trans('admin.recipe.columns.img') }}">
        <div v-if="errors.has('img')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('img') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('time'), 'has-success': fields.time && fields.time.valid }">
    <label for="time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.recipe.columns.time') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.time" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('time'), 'form-control-success': fields.time && fields.time.valid}" id="time" name="time" placeholder="{{ trans('admin.recipe.columns.time') }}">
        <div v-if="errors.has('time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vegan'), 'has-success': fields.vegan && fields.vegan.valid }">
    <label for="vegan" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.recipe.columns.vegan') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.vegan" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('vegan'), 'form-control-success': fields.vegan && fields.vegan.valid}" id="vegan" name="vegan" placeholder="{{ trans('admin.recipe.columns.vegan') }}">
        <div v-if="errors.has('vegan')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vegan') }}</div>
    </div>
</div>


