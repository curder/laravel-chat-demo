
![](./public/chat-room.png)

## Introduction

This project is about laravel real time chat demo using redis and socket.io.

```
git clone https://github.com/curder/laravel-chat-demo.git

cd laravel-chat-demo

composer install

cp .env.example .env

php artisan key:generate

touch database/database.sqlite
```

change your database connection info, and run `php artisan migrate:refresh --seed` and through by this url `http://laravel-chat-demo.test/register`  register some new user.


## Some Url

Chat Room: `http://laravel-chat-demo.test/chat`
