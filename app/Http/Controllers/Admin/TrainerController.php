<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrainerRequest;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use App\Trainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trainer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainers = Trainer::all();

        return view('admin.trainers.index', compact('trainers'));
    }

    public function create()
    {
        abort_if(Gate::denies('trainer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainers.create');
    }

    public function store(StoreTrainerRequest $request)
    {
        $trainer = Trainer::create($request->all());

        return redirect()->route('admin.trainers.index');
    }

    public function edit(Trainer $trainer)
    {
        abort_if(Gate::denies('trainer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainers.edit', compact('trainer'));
    }

    public function update(UpdateTrainerRequest $request, Trainer $trainer)
    {
        $trainer->update($request->all());

        return redirect()->route('admin.trainers.index');
    }

    public function show(Trainer $trainer)
    {
        abort_if(Gate::denies('trainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainers.show', compact('trainer'));
    }

    public function destroy(Trainer $trainer)
    {
        abort_if(Gate::denies('trainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainer->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainerRequest $request)
    {
        Trainer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
