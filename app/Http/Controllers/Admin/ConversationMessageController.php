<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConversationMessageRequest;
use App\Http\Requests\StoreConversationMessageRequest;
use App\ConversationMessage;
use App\Conversation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;

class ConversationMessageController extends Controller
{
  
    public function store($id,StoreConversationMessageRequest $request)
    {
        $ss =ConversationMessage::create([
            'conversation_id' => $id,
            'user_id' => auth()->id(),
            'message' => request('message')
        ]);


        return redirect()->back();
    }


}
