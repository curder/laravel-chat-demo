<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['send', 'chat']);
    }

    public function send(Request $request)
    {
        $message = $request->message;

        $user = User::find(Auth::id());
        event(new ChatEvent($message, $user));
return $request->all();
    }

    public function chat()
    {
        return view('chat');
    }
}
