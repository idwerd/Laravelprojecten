<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ConversationRequest;
use App\Models\Conversation;
use App\Models\Advert;
use App\Models\Message;

class ConversationController extends Controller
{

    public function store(ConversationRequest $request, Advert $advert) {

        $validated = $request->validated();
        $conversation = Conversation::create([
            'advert_id' => $advert->id,
        ]);
        $user1 = Auth::user();
        $user2 = $advert->user;
        
        Message::create([
            'user_id' => $user1->id,
            'conversation_id' => $conversation->id,
            'body' => $validated['body'],
        ]);
        
        $conversation->users()->attach([$user1->id, $user2->id]);

        return redirect()->route('account.dashboard');

    }

}
