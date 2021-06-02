import AppForm from '../app-components/Form/AppForm';

Vue.component('recipe-ing-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_recipe:  '' ,
                id_ingredient:  '' ,
                
            }
        }
    }

});