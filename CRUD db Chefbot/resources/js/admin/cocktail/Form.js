import AppForm from '../app-components/Form/AppForm';

Vue.component('cocktail-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                url:  '' ,
                img:  '' ,
                alcool:  '' ,
                
            }
        }
    }

});