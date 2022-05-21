<?php

namespace App\Http\Requests;

use App\Models\Paymentmethod;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentmethodRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('paymentmethod_create'),
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
        ];
    }
}
