<?php

namespace App\Http\Requests;

use App\Models\Panchayat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePanchayatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('panchayat_edit'),
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
            'block_id' => [
                'integer',
                'exists:blocks,id',
                'required',
            ],
        ];
    }
}
