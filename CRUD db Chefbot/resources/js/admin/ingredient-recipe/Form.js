import AppForm from '../app-components/Form/AppForm';

Vue.component('ingredient-recipe-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name_food:  '' ,
                
            }
        }
    }

});