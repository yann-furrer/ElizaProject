import AppForm from '../app-components/Form/AppForm';

Vue.component('cocktail-ing-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_cocktail:  '' ,
                id_ingredient:  '' ,
                
            }
        }
    }

});