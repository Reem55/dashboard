<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStadiumRequest;
use App\Http\Requests\StoreStadiumRequest;
use App\Http\Requests\UpdateStadiumRequest;
use App\Stadium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StadiumController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stadium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stadia = Stadium::all();

        return view('admin.stadia.index', compact('stadia'));
    }

    public function create()
    {
        abort_if(Gate::denies('stadium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stadia.create');
    }

    public function store(StoreStadiumRequest $request)
    {
        $stadium = Stadium::create($request->all());

        return redirect()->route('admin.stadia.index');
    }

    public function edit(Stadium $stadium)
    {
        abort_if(Gate::denies('stadium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stadia.edit', compact('stadium'));
    }

    public function update(UpdateStadiumRequest $request, Stadium $stadium)
    {
        $stadium->update($request->all());

        return redirect()->route('admin.stadia.index');
    }

    public function show(Stadium $stadium)
    {
        abort_if(Gate::denies('stadium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stadia.show', compact('stadium'));
    }

    public function destroy(Stadium $stadium)
    {
        abort_if(Gate::denies('stadium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stadium->delete();

        return back();
    }

    public function massDestroy(MassDestroyStadiumRequest $request)
    {
        Stadium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
