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
            usernames: [],
            colors: [],
        }
    },
    methods: {
        send(){
            if (this.message) {
                this.chat.messages.push(this.message);
                this.chat.usernames.push('You');
                this.chat.colors.push('success');
                axios.post('/send', {
                    message: this.message
                }).then(response => {
                    // console.log(response);
                    this.message = '';
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    },
    mounted(){
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.messages.push(e.message);
                this.chat.usernames.push(e.user.name);
                this.chat.colors.push('warning');
            });
    }
});
