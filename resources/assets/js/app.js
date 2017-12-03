require('./bootstrap');

window.Vue = require('vue');

// Automatic scroll-to-bottom directive for Vue.js 2.0 https://github.com/theomessin/vue-chat-scroll
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll);

Vue.component('message', require('./components/Message.vue'));

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        chat: {
            messages: [],
        }
    },
    methods: {
        send(){
            if (this.message) {
                this.chat.messages.push(this.message)
            }
        }
    }
});
