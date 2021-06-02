import AppForm from '../app-components/Form/AppForm';

Vue.component('recipe-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                url:  '' ,
                img:  '' ,
                time:  '' ,
                vegan:  '' ,
                
            }
        }
    }

});