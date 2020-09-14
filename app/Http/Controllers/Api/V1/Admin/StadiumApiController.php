<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStadiumRequest;
use App\Http\Requests\UpdateStadiumRequest;
use App\Http\Resources\Admin\StadiumResource;
use App\Stadium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StadiumApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stadium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StadiumResource(Stadium::all());
    }

    public function store(StoreStadiumRequest $request)
    {
        $stadium = Stadium::create($request->all());

        return (new StadiumResource($stadium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Stadium $stadium)
    {
        abort_if(Gate::denies('stadium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StadiumResource($stadium);
    }

    public function update(UpdateStadiumRequest $request, Stadium $stadium)
    {
        $stadium->update($request->all());

        return (new StadiumResource($stadium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Stadium $stadium)
    {
        abort_if(Gate::denies('stadium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stadium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
