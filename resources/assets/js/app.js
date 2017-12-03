require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
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
