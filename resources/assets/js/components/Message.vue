<template>
    <div>
        <li class="list-group-item" :class="className">
            {{ message }}
            <span class="chat-time"
                  v-text="time"></span>
        </li>
        <small class="badge float-right" :class="badgeClass">{{ username }}</small>
    </div>
</template>
<script>
    export default {
        props: [
            'message',
            'color',
            'username',
            'time'
        ],
        computed: {
            className (){
                return 'list-group-item-' + this.color;
            },
            badgeClass(){
                return 'badge-' + this.color;
            }
        },
    }
</script>

