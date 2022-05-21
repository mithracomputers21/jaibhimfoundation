<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Habitation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HabitationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('habitation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habitation.index');
    }

    public function create()
    {
        abort_if(Gate::denies('habitation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habitation.create');
    }

    public function edit(Habitation $habitation)
    {
        abort_if(Gate::denies('habitation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.habitation.edit', compact('habitation'));
    }

    public function show(Habitation $habitation)
    {
        abort_if(Gate::denies('habitation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $habitation->load('panchayat');

        return view('admin.habitation.show', compact('habitation'));
    }
}
