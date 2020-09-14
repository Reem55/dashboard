<?php

namespace App\Http\Requests;

use App\ProductConsumption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProductConsumptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_consumption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'product_id'           => [
                'required','exists:products,id'
            ],
            'code'         => [
                'required',
                'unique:product_consumptions,id',
            ],
            'receiver_name'         => [
                'required',
            ],
            'reason'         => [
                'required',
            ],
            'date'         => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'quantity'         => [
                'required',
            ]
        ];
    }
}
