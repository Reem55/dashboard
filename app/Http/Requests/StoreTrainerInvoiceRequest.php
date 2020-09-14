<?php

namespace App\Http\Requests;

use App\TrainerInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTrainerInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trainer_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'trainer_id'     => [
                'required',
                'integer',
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
