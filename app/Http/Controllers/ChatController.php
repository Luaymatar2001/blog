<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Providers\UserService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chatForm($user_id, UserService $userService)
    {
        $receiver = $userService->getUser($user_id);
        $messages = Message::where(function (Builder $query) use ($user_id) {
            $query->where('sender', Auth::id())->where('receiver', $user_id);
        })->orWhere(
            function (Builder $query) use ($user_id) {
                $query->where('receiver', Auth::id())->where('sender', $user_id);
            }
        )->get();
        // dd($receiver->toArray());
        return view('blog.chat', compact('receiver', 'messages'));
    }
    public function sendMessage(Request $request, $user_id,  UserService $userService)
    {
        $userService->sendMessage($user_id, $request['message']);
        return response()->json('message sent');
    }
}
