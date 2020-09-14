<?php

namespace App\Http\Requests;

use App\Trainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTrainerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trainer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
