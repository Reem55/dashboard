<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\stockssorting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class StocksortingController extends Controller
{
    public function index()
    {
//        abort_if(Gate::denies('stocksorting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockssorting = stockssorting::all();

        return view('admin.stockssorting.index', compact('stockssorting'));
    }

    public function create()
    {
//        abort_if(Gate::denies('stockssorting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        return view('admin.stocksorting.create');
    }

    public function store(StorestocksortingRequest $request)
    {
        $stockssorting = stockssorting::create($request->all());

        return redirect()->route('admin.stocksorting.index');
    }

    public function edit(Stocksorting $stockssorting)
    {
//        abort_if(Gate::denies('stockssorting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stockssorting.edit', compact('stocksorting'));
    }

    public function update(UpdatetocksortingRequest $request, Stocksorting $stocksorting)
    {
        $stocksorting->update($request->all());

        return redirect()->route('admin.stockssorting.index');
    }

    public function show(Player $player)
    {
//        abort_if(Gate::denies('stocksorting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stockssorting.show', compact('player'));
    }

    public function destroy(Player $player)
    {
        abort_if(Gate::denies('stocksorting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stocksorting->delete();

        return back();
    }

    public function massDestroy(MassDestroystockssortingRequest $request)
    {
        Player::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
