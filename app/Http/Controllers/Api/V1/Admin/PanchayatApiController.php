<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePanchayatRequest;
use App\Http\Requests\UpdatePanchayatRequest;
use App\Http\Resources\Admin\PanchayatResource;
use App\Models\Panchayat;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PanchayatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('panchayat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PanchayatResource(Panchayat::with(['block'])->get());
    }

    public function store(StorePanchayatRequest $request)
    {
        $panchayat = Panchayat::create($request->validated());

        return (new PanchayatResource($panchayat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PanchayatResource($panchayat->load(['block']));
    }

    public function update(UpdatePanchayatRequest $request, Panchayat $panchayat)
    {
        $panchayat->update($request->validated());

        return (new PanchayatResource($panchayat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panchayat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
