<?php

namespace App\Http\Requests;

use App\ConversationMessage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreConversationMessageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('conversation_message_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'message'         => [
                'required'
            ]
        ];
    }
}
