<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHabitationRequest;
use App\Http\Requests\UpdateHabitationRequest;
use App\Http\Resources\Admin\HabitationResource;
use App\Models\Habitation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HabitationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('habitation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HabitationResource(Habitation::with(['panchayat'])->get());
    }

    public function store(StoreHabitationRequest $request)
    {
        $habitation = Habitation::create($request->validated());

        return (new HabitationResource($habitation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Habitation $habitation)
    {
        abort_if(Gate::denies('habitation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HabitationResource($habitation->load(['panchayat']));
    }

    public function update(UpdateHabitationRequest $request, Habitation $habitation)
    {
        $habitation->update($request->validated());

        return (new HabitationResource($habitation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Habitation $habitation)
    {
        abort_if(Gate::denies('habitation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $habitation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
