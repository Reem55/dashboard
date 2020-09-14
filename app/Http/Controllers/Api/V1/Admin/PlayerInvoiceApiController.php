<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerInvoiceRequest;
use App\Http\Requests\UpdatePlayerInvoiceRequest;
use App\Http\Resources\Admin\PlayerInvoiceResource;
use App\PlayerInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerInvoiceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('player_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayerInvoiceResource(PlayerInvoice::with(['palyer'])->get());
    }

    public function store(StorePlayerInvoiceRequest $request)
    {
        $playerInvoice = PlayerInvoice::create($request->all());
        $playerInvoice->palyer()->sync($request->input('palyer', []));

        return (new PlayerInvoiceResource($playerInvoice))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PlayerInvoice $playerInvoice)
    {
        abort_if(Gate::denies('player_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayerInvoiceResource($playerInvoice->load(['palyer']));
    }

    public function update(UpdatePlayerInvoiceRequest $request, PlayerInvoice $playerInvoice)
    {
        $playerInvoice->update($request->all());
        $playerInvoice->palyer()->sync($request->input('palyer', []));

        return (new PlayerInvoiceResource($playerInvoice))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PlayerInvoice $playerInvoice)
    {
        abort_if(Gate::denies('player_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $playerInvoice->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
