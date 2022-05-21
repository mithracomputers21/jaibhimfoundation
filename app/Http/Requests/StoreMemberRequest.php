<?php

namespace App\Http\Requests;

use App\Models\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('member_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'category' => [
                'required',
                'in:' . implode(',', array_keys(Member::CATEGORY_SELECT)),
            ],
            'type' => [
                'required',
                'in:' . implode(',', array_keys(Member::TYPE_SELECT)),
            ],
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'payment' => [
                'string',
                'nullable',
            ],
            'payment_method_id' => [
                'integer',
                'exists:paymentmethods,id',
                'required',
            ],
            'payment_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'amount' => [
                'string',
                'required',
            ],
            'transaction' => [
                'string',
                'nullable',
            ],
            'district_id' => [
                'integer',
                'exists:districts,id',
                'nullable',
            ],
            'block_id' => [
                'integer',
                'exists:blocks,id',
                'nullable',
            ],
            'panchayat_id' => [
                'integer',
                'exists:panchayats,id',
                'nullable',
            ],
            'habitation_id' => [
                'integer',
                'exists:habitations,id',
                'nullable',
            ],
            'contact_person_name' => [
                'string',
                'nullable',
            ],
            'contact_person_number' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Member::STATUS_SELECT)),
            ],
        ];
    }
}
