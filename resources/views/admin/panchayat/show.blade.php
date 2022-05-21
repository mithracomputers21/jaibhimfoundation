@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.panchayat.title_singular') }}:
                    {{ trans('cruds.panchayat.fields.id') }}
                    {{ $panchayat->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.panchayat.fields.id') }}
                            </th>
                            <td>
                                {{ $panchayat->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.panchayat.fields.name') }}
                            </th>
                            <td>
                                {{ $panchayat->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.panchayat.fields.block') }}
                            </th>
                            <td>
                                @if($panchayat->block)
                                    <span class="badge badge-relationship">{{ $panchayat->block->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('panchayat_edit')
                    <a href="{{ route('admin.panchayats.edit', $panchayat) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.panchayats.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection