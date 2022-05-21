@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.member.title_singular') }}:
                    {{ trans('cruds.member.fields.id') }}
                    {{ $member->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.id') }}
                            </th>
                            <td>
                                {{ $member->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.category') }}
                            </th>
                            <td>
                                {{ $member->category_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.type') }}
                            </th>
                            <td>
                                {{ $member->type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.name') }}
                            </th>
                            <td>
                                {{ $member->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.email') }}
                            </th>
                            <td>
                                {{ $member->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.phone') }}
                            </th>
                            <td>
                                {{ $member->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.address') }}
                            </th>
                            <td>
                                {{ $member->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.payment') }}
                            </th>
                            <td>
                                {{ $member->payment }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.payment_method') }}
                            </th>
                            <td>
                                @if($member->paymentMethod)
                                    <span class="badge badge-relationship">{{ $member->paymentMethod->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.payment_date') }}
                            </th>
                            <td>
                                {{ $member->payment_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.amount') }}
                            </th>
                            <td>
                                {{ $member->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.transaction') }}
                            </th>
                            <td>
                                {{ $member->transaction }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.payment_screenshot') }}
                            </th>
                            <td>
                                @foreach($member->payment_screenshot as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.photo') }}
                            </th>
                            <td>
                                @foreach($member->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.district') }}
                            </th>
                            <td>
                                @if($member->district)
                                    <span class="badge badge-relationship">{{ $member->district->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.block') }}
                            </th>
                            <td>
                                @if($member->block)
                                    <span class="badge badge-relationship">{{ $member->block->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.panchayat') }}
                            </th>
                            <td>
                                @if($member->panchayat)
                                    <span class="badge badge-relationship">{{ $member->panchayat->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.habitation') }}
                            </th>
                            <td>
                                @if($member->habitation)
                                    <span class="badge badge-relationship">{{ $member->habitation->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.contact_person_name') }}
                            </th>
                            <td>
                                {{ $member->contact_person_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.contact_person_number') }}
                            </th>
                            <td>
                                {{ $member->contact_person_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.member.fields.status') }}
                            </th>
                            <td>
                                {{ $member->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('member_edit')
                    <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection