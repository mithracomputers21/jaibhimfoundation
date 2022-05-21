<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentmethodRequest;
use App\Http\Requests\UpdatePaymentmethodRequest;
use App\Http\Resources\Admin\PaymentmethodResource;
use App\Models\Paymentmethod;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentmethodApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paymentmethod_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentmethodResource(Paymentmethod::all());
    }

    public function store(StorePaymentmethodRequest $request)
    {
        $paymentmethod = Paymentmethod::create($request->validated());

        return (new PaymentmethodResource($paymentmethod))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Paymentmethod $paymentmethod)
    {
        abort_if(Gate::denies('paymentmethod_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentmethodResource($paymentmethod);
    }

    public function update(UpdatePaymentmethodRequest $request, Paymentmethod $paymentmethod)
    {
        $paymentmethod->update($request->validated());

        return (new PaymentmethodResource($paymentmethod))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Paymentmethod $paymentmethod)
    {
        abort_if(Gate::denies('paymentmethod_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentmethod->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
