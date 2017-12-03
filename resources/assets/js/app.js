require('./bootstrap');

window.Vue = require('vue');

// Automatic scroll-to-bottom directive for Vue.js 2.0 https://github.com/theomessin/vue-chat-scroll
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll);

// Vue Toaster https://github.com/paliari/v-toaster
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000});

Vue.component('message-box', require('./components/MessageBox.vue'));

const app = new Vue({
    el: '#app',

});
