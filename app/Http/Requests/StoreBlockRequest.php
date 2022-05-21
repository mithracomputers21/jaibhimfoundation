<?php

namespace App\Http\Requests;

use App\Models\Block;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlockRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('block_create'),
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
            'name' => [
                'string',
                'required',
            ],
            'district_id' => [
                'integer',
                'exists:districts,id',
                'nullable',
            ],
        ];
    }
}
