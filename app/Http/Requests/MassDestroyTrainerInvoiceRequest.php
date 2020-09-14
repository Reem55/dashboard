<?php

namespace App\Http\Requests;

use App\TrainerInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTrainerInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trainer_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trainer_invoices,id',
        ];
    }
}
