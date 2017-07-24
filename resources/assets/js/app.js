/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

window.api = {
    index: '/',
    user: 'user/',
    tools: {
        sendCode: 'tools/sendmsg',
    },
    shop: {
        list: 'shop/list',
        show: 'shop/details',
    }
};


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('setphone', require('./components/SetPhone.vue'));
//index
Vue.component('index-search', require('./components/Index/Search.vue'));
Vue.component('index-banner', require('./components/Index/Banner.vue'));
Vue.component('index-menu', require('./components/Index/Menu.vue'));
Vue.component('index-list', require('./components/Index/List.vue'));

window.app = new Vue({
    el: '#app',
    data(){
        return {
            search: '123'
        }
    }
});
