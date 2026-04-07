<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Models\Conversation;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(MessageRequest $request, Conversation $conversation) {

        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['conversation_id'] = $conversation->id;
        $message = Message::create($validated);
        $message->save();

        return redirect()->route('account.dashboard')->withFragment('open-conversation-' . $conversation->id);

    }
}
