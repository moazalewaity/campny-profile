import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
 
import routes from './routers/index.js'
import store from './store/index.js'

import axios from 'axios'

Vue.prototype.$axios = axios

Vue.config.productionTip = false



// import Home  from './components/Home.vue'
Vue.component('Slide' , require('./components/home/index.vue'))
Vue.use(VueRouter)
Vue.use(Vuex)

const app = new Vue({
    el: '#app',
    router : new VueRouter(routes),
    store: new Vuex.Store(store)
});
