@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.block.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('block_create')
                    <a class="btn btn-indigo" href="{{ route('admin.blocks.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.block.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('block.index')

    </div>
</div>
@endsection