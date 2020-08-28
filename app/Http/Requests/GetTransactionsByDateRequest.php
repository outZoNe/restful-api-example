<?php

namespace App\Http\Requests;

class GetTransactionsByDateRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Field date is required!',
            'date.date_format' => 'Field date should have format: Y-m-d!',
        ];
    }
}
