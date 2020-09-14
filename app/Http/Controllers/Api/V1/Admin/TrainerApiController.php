<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use App\Http\Resources\Admin\TrainerResource;
use App\Trainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trainer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainerResource(Trainer::all());
    }

    public function store(StoreTrainerRequest $request)
    {
        $trainer = Trainer::create($request->all());

        return (new TrainerResource($trainer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Trainer $trainer)
    {
        abort_if(Gate::denies('trainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainerResource($trainer);
    }

    public function update(UpdateTrainerRequest $request, Trainer $trainer)
    {
        $trainer->update($request->all());

        return (new TrainerResource($trainer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Trainer $trainer)
    {
        abort_if(Gate::denies('trainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
