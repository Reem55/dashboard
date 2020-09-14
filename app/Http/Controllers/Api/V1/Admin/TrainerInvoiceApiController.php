<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainerInvoiceRequest;
use App\Http\Requests\UpdateTrainerInvoiceRequest;
use App\Http\Resources\Admin\TrainerInvoiceResource;
use App\TrainerInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainerInvoiceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trainer_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainerInvoiceResource(TrainerInvoice::with(['trainer'])->get());
    }

    public function store(StoreTrainerInvoiceRequest $request)
    {
        $trainerInvoice = TrainerInvoice::create($request->all());
        $trainerInvoice->trainer()->sync($request->input('trainer', []));

        return (new TrainerInvoiceResource($trainerInvoice))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TrainerInvoice $trainerInvoice)
    {
        abort_if(Gate::denies('trainer_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainerInvoiceResource($trainerInvoice->load(['trainer']));
    }

    public function update(UpdateTrainerInvoiceRequest $request, TrainerInvoice $trainerInvoice)
    {
        $trainerInvoice->update($request->all());
        $trainerInvoice->trainer()->sync($request->input('trainer', []));

        return (new TrainerInvoiceResource($trainerInvoice))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TrainerInvoice $trainerInvoice)
    {
        abort_if(Gate::denies('trainer_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainerInvoice->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
