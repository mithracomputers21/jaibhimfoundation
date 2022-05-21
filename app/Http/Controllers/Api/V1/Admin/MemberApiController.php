<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Resources\Admin\MemberResource;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemberApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MemberResource(Member::with(['paymentMethod', 'district', 'block', 'panchayat', 'habitation'])->get());
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->validated());

        if ($request->input('member_payment_screenshot', false)) {
            $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('member_payment_screenshot'))))->toMediaCollection('member_payment_screenshot');
        }

        if ($request->input('member_photo', false)) {
            $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('member_photo'))))->toMediaCollection('member_photo');
        }

        return (new MemberResource($member))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MemberResource($member->load(['paymentMethod', 'district', 'block', 'panchayat', 'habitation']));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->validated());

        if ($request->input('member_payment_screenshot', false)) {
            if (!$member->member_payment_screenshot || $request->input('member_payment_screenshot') !== $member->member_payment_screenshot->file_name) {
                if ($member->member_payment_screenshot) {
                    $member->member_payment_screenshot->delete();
                }
                $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('member_payment_screenshot'))))->toMediaCollection('member_payment_screenshot');
            }
        } elseif ($member->member_payment_screenshot) {
            $member->member_payment_screenshot->delete();
        }

        if ($request->input('member_photo', false)) {
            if (!$member->member_photo || $request->input('member_photo') !== $member->member_photo->file_name) {
                if ($member->member_photo) {
                    $member->member_photo->delete();
                }
                $member->addMedia(storage_path('tmp/uploads/' . basename($request->input('member_photo'))))->toMediaCollection('member_photo');
            }
        } elseif ($member->member_photo) {
            $member->member_photo->delete();
        }

        return (new MemberResource($member))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
