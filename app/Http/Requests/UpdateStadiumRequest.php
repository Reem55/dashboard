<?php

namespace App\Http\Requests;

use App\Stadium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateStadiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stadium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'           => [
                'required',
            ],
            'amount'         => [
                'required',
            ],
            'invoice_number' => [
                'digits_between:0,10',
            ],
            'invoice_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
