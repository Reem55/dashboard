<?php

namespace App\Http\Requests;

use App\PlayerInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPlayerInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('player_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:player_invoices,id',
        ];
    }
}
