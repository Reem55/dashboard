<?php

namespace App\Http\Requests;

use App\Trainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTrainerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trainer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
