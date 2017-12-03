<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div class="container" id="app">
    <div class="row">
        <div class=" offset-3 col-6 mt-lg-5">
            <li class="list-group-item active">Chat Room</li>
            <ul class="list-group chat-room">
                <message v-for="(message, key) in chat.messages" :key="key">
                    @{{ message }}
                </message>
                <input type="text"
                       v-model="message"
                       @keyup.enter="send"
                       class="form-control form-control-lg"
                       placeholder="输入您想说的话 ..">
            </ul>
        </div>
    </div>
</div>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
