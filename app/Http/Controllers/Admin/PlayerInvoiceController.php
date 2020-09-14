<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlayerInvoiceRequest;
use App\Http\Requests\StorePlayerInvoiceRequest;
use App\Http\Requests\UpdatePlayerInvoiceRequest;
use App\Player;
use App\PlayerInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerInvoiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('player_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $playerInvoices = PlayerInvoice::all();

        return view('admin.playerInvoices.index', compact('playerInvoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('player_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $palyers = Player::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.playerInvoices.create', compact('palyers'));
    }

    public function store(StorePlayerInvoiceRequest $request)
    {
        $playerInvoice = PlayerInvoice::create($request->all());

        return redirect()->route('admin.player-invoices.index');
    }

    public function edit(PlayerInvoice $playerInvoice)
    {
        abort_if(Gate::denies('player_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $palyers = Player::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $playerInvoice->load('palyer');

        return view('admin.playerInvoices.edit', compact('palyers', 'playerInvoice'));
    }

    public function update(UpdatePlayerInvoiceRequest $request, PlayerInvoice $playerInvoice)
    {
        $playerInvoice->update($request->all());

        return redirect()->route('admin.player-invoices.index');
    }

    public function show(PlayerInvoice $playerInvoice)
    {
        abort_if(Gate::denies('player_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $playerInvoice->load('palyer');

        return view('admin.playerInvoices.show', compact('playerInvoice'));
    }

    public function destroy(PlayerInvoice $playerInvoice)
    {
        abort_if(Gate::denies('player_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $playerInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlayerInvoiceRequest $request)
    {
        PlayerInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
