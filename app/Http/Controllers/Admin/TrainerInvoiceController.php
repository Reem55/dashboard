<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrainerInvoiceRequest;
use App\Http\Requests\StoreTrainerInvoiceRequest;
use App\Http\Requests\UpdateTrainerInvoiceRequest;
use App\Trainer;
use App\TrainerInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainerInvoiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trainer_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainerInvoices = TrainerInvoice::all();

        return view('admin.trainerInvoices.index', compact('trainerInvoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('trainer_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainers = Trainer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trainerInvoices.create', compact('trainers'));
    }

    public function store(StoreTrainerInvoiceRequest $request)
    {
        $trainerInvoice = TrainerInvoice::create($request->all());

        return redirect()->route('admin.trainer-invoices.index');
    }

    public function edit(TrainerInvoice $trainerInvoice)
    {
        abort_if(Gate::denies('trainer_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainers = Trainer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trainerInvoice->load('trainer');

        return view('admin.trainerInvoices.edit', compact('trainers', 'trainerInvoice'));
    }

    public function update(UpdateTrainerInvoiceRequest $request, TrainerInvoice $trainerInvoice)
    {
        $trainerInvoice->update($request->all());

        return redirect()->route('admin.trainer-invoices.index');
    }

    public function show(TrainerInvoice $trainerInvoice)
    {
        abort_if(Gate::denies('trainer_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainerInvoice->load('trainer');

        return view('admin.trainerInvoices.show', compact('trainerInvoice'));
    }

    public function destroy(TrainerInvoice $trainerInvoice)
    {
        abort_if(Gate::denies('trainer_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainerInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainerInvoiceRequest $request)
    {
        TrainerInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
