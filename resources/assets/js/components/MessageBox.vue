<template>
    <div class="row">
        <div class=" offset-3 col-6 mt-5 col-sm-10 offset-sm-1">

            <div class="card">
                <div class="card-header">聊天室</div>
                <div class="card-block">
                    <div class="badge badge-pill badge-primary" v-text="typing"></div>
                    <div class="list-group chat-room" v-chat-scroll>
                        <message v-for="(message, key) in chat.messages"
                                 color="success"
                                 :username="chat.usernames[key]"
                                 :color="chat.colors[key]"
                                 :time="chat.times[key]"
                                 :message="message"
                                 :key="key">
                        </message>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="text"
                           v-model="message"
                           @keyup.enter="send"
                           class="form-control"
                           placeholder="输入您想说的话 ..">
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import Message from './Message.vue';
    export default {
        data() {
            return {
                message: '',
                chat: {
                    messages: [],
                    usernames: [],
                    colors: [],
                    times: [],
                },
                typing: '',
            }
        },
        methods: {
            send(){
                if (this.message) {

                    axios.post('/send', {
                        message: this.message
                    }).then(response => {
                        this.chat.messages.push(this.message);
                        this.chat.usernames.push('You');
                        this.chat.colors.push('success');
                        this.chat.times.push(this.getTime());
                        // console.log(response);
                        this.message = '';
                    }).catch(error => {
                        console.log(error);
                    });
                }
            },
            getTime(){
                let time = new Date();
                return time.getHours() + ':' + time.getMinutes();
            }
        },
        mounted(){
            Echo.private('chat')
                .listen('ChatEvent', (e) => {
                    this.chat.messages.push(e.message);
                    this.chat.usernames.push(e.user.name);
                    this.chat.colors.push('warning');
                    this.chat.times.push(this.getTime());
                })
                .listenForWhisper('typing', (e) => {
                    if (e.name != '') {
                        this.typing = 'typing...';
                    } else {
                        this.typing = '';
                    }
                })
        },
        watch: {
            message(){
                // console.log(this.message);
                Echo.private('chat')
                    .whisper('typing', {
                        name: this.message
                    });
            }
        },
        components: {
            message: Message
        }
    }
</script>
