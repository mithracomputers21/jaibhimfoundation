@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.block.title_singular') }}:
                    {{ trans('cruds.block.fields.id') }}
                    {{ $block->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.block.fields.id') }}
                            </th>
                            <td>
                                {{ $block->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.block.fields.name') }}
                            </th>
                            <td>
                                {{ $block->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.block.fields.district') }}
                            </th>
                            <td>
                                @if($block->district)
                                    <span class="badge badge-relationship">{{ $block->district->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('block_edit')
                    <a href="{{ route('admin.blocks.edit', $block) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.blocks.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection