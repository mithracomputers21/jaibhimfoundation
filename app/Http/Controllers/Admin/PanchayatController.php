<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Panchayat;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PanchayatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('panchayat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.panchayat.index');
    }

    public function create()
    {
        abort_if(Gate::denies('panchayat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.panchayat.create');
    }

    public function edit(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.panchayat.edit', compact('panchayat'));
    }

    public function show(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panchayat->load('block');

        return view('admin.panchayat.show', compact('panchayat'));
    }
}
