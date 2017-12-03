<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ChatController
 * @package App\Http\Controllers
 */
class ChatController extends Controller
{
    /**
     * ChatController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['send', 'chat']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chat()
    {
        return view('chat');
    }

    /**
     * @param Request $request
     */
    public function send(Request $request)
    {
        $message = $request->message;

        $this->saveToSession($request);
        event(new ChatEvent($message, Auth::user()));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function saveToSession(Request $request)
    {
        session()->put('chat', $request->chat);
        return $this->getOldMessage();
    }

    /**
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function getOldMessage()
    {
        return session('chat');
    }


    public function deleteSession()
    {
        session()->forget('chat');
    }
}
