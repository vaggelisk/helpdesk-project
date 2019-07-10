// assets/js/app.js
import Vue from 'vue';
import Vuetify from 'vuetify'

Vue.use(Vuetify)

import Example from './components/Example'
import Profile from './components/Profile'

/**
 * Create a fresh Vue Application instance
 */
new Vue({
    el: '#app',
    components: {Example, Profile}
});