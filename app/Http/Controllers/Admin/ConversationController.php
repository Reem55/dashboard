<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConversationRequest;
use App\Http\Requests\StoreConversationRequest;
use App\Conversation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;

class ConversationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('conversation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(auth()->user()->isSuperAdmin())
        {
            $conversations = Conversation::all();   
        }

        if(auth()->user()->isUserAdmin())
        {
//            $conversations = Conversation::whereHas('messages',function($q){
//                $q->where('user_id',auth()->id());
//            })->get();

            $conversations = Conversation::where('user_id',auth()->id())->get();
        }

        return view('admin.conversations.index', compact('conversations'));
    }

    public function create()
    {
        abort_if(Gate::denies('conversation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('id','!=',1)->get();

        return view('admin.conversations.create',compact('users'));
    }

    public function store(StoreConversationRequest $request)
    {
        $conversation = Conversation::create($request->all());

        return redirect()->route('admin.conversations.index');
    }

    // public function edit(Conversation $conversation)
    // {
    //     abort_if(Gate::denies('conversation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.conversations.edit', compact('conversation'));
    // }

    // public function update(UpdateConversationRequest $request, Conversation $conversation)
    // {
    //     $conversation->update($request->all());

    //     return redirect()->route('admin.conversations.index');
    // }

    public function show(Conversation $conversation)
    {
        abort_if(Gate::denies('conversation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messages = $conversation->messages;


        return view('admin.conversations.show', compact('conversation','messages'));
    }

    public function destroy(Conversation $conversation)
    {
        abort_if(Gate::denies('conversation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conversation->delete();

        return back();
    }

    public function massDestroy(MassDestroyConversationRequest $request)
    {

        Conversation::whereIn('id', request('ids'))->delete();

        // $conversations = Conversation::whereIn('id', request('ids'))->get();

        // foreach($conversations as $value){
        //     $value->messages()->delete();
        // }

        // $conversations->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
