<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlockController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('block_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.block.index');
    }

    public function create()
    {
        abort_if(Gate::denies('block_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.block.create');
    }

    public function edit(Block $block)
    {
        abort_if(Gate::denies('block_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.block.edit', compact('block'));
    }

    public function show(Block $block)
    {
        abort_if(Gate::denies('block_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $block->load('district');

        return view('admin.block.show', compact('block'));
    }
}
