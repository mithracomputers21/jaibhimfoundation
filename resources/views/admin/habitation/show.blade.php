@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.habitation.title_singular') }}:
                    {{ trans('cruds.habitation.fields.id') }}
                    {{ $habitation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.habitation.fields.id') }}
                            </th>
                            <td>
                                {{ $habitation->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.habitation.fields.name') }}
                            </th>
                            <td>
                                {{ $habitation->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.habitation.fields.panchayat') }}
                            </th>
                            <td>
                                @if($habitation->panchayat)
                                    <span class="badge badge-relationship">{{ $habitation->panchayat->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('habitation_edit')
                    <a href="{{ route('admin.habitations.edit', $habitation) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.habitations.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection