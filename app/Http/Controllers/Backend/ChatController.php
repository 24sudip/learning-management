<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ChatMessage, User};
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function SendMessage(Request $request) {
        $request->validate([
            'msg' => 'required'
        ]);
        ChatMessage::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'msg' => $request->msg,
            'created_at' => now()
        ]);
        return response()->json(['message' => 'Message Sent Successfully']);
    }

    public function GetAllUsers() {
        $chat_messages = ChatMessage::orderBy('id','DESC')->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())->get();
        $users = $chat_messages->flatMap(function ($chat) {
            if ($chat->sender_id === auth()->id()) {
                return [$chat->sender, $chat->receiver];
            }
            return [$chat->receiver, $chat->sender];
        })->unique();
        return $users;
    }

    public function UserMsgById($userId) {

    }
}
