@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.panchayat.title_singular') }}:
                    {{ trans('cruds.panchayat.fields.id') }}
                    {{ $panchayat->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('panchayat.edit', [$panchayat])
        </div>
    </div>
</div>
@endsection