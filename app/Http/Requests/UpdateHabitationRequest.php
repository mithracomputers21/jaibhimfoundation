<?php

namespace App\Http\Requests;

use App\Models\Habitation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHabitationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('habitation_edit'),
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
            'panchayat_id' => [
                'integer',
                'exists:panchayats,id',
                'required',
            ],
        ];
    }
}
