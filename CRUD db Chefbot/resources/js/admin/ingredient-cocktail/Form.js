import AppForm from '../app-components/Form/AppForm';

Vue.component('ingredient-cocktail-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name_drink:  '' ,
                
            }
        }
    }

});