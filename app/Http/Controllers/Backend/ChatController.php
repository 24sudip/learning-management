<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    public function SendMessage(Request $request) {
        $request->validate([
            'msg' => 'required'
        ]);
    }
}
