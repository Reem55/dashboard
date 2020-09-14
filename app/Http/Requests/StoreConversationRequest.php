<?php

namespace App\Http\Requests;

use App\Conversation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreConversationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('conversation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user_id'           => [
                'required','exists:users,id'
            ],
            'title'         => [
                'required', 'max:190'
            ]
        ];
    }
}
