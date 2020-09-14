<?php

namespace App\Http\Requests;

use App\PlayerInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePlayerInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('player_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'palyer_id'      => [
                'required',
                'integer',
            ],
            'amount'         => [
                'required',
            ],
            'invoice_number' => [
                'required',
                'digits_between:0,10',
            ],
            'invoice_type'   => [
                'required',
            ],
            'invoice_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
