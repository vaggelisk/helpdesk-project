// assets/js/app.js
import Vue from 'vue';
import Vuetify from 'vuetify'

import Example from './components/Example'
import Profile from './components/Profile'

Vue.use(Vuetify)


/**
 * Create a fresh Vue Application instance
 */
new Vue({
    el: '#app',
    components: {Example, Profile}
});