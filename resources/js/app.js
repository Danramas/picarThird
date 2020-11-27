import Vue from 'vue'
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';
import 'element-ui/lib/theme-chalk/index.css';
import './bootstrap';
import router from './routes';
import store from './store'
import app from './App.vue'
import Vuetify from 'vuetify';
import { Notification } from 'element-ui';
import './bootstrap';

Vue.prototype.$notify = Notification;

Vue.use(ElementUI, { locale });

const vuetifyOptions = { };
export const eventBus = new Vue();


new Vue({
    el: '#app',
    components: {app},
    store,
    router,
    vuetify: new Vuetify(vuetifyOptions)
});
