<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paymentmethod;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentmethodController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paymentmethod_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentmethod.index');
    }

    public function create()
    {
        abort_if(Gate::denies('paymentmethod_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentmethod.create');
    }

    public function edit(Paymentmethod $paymentmethod)
    {
        abort_if(Gate::denies('paymentmethod_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentmethod.edit', compact('paymentmethod'));
    }

    public function show(Paymentmethod $paymentmethod)
    {
        abort_if(Gate::denies('paymentmethod_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentmethod.show', compact('paymentmethod'));
    }
}
