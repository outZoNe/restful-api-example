<?php

namespace App\Http\Requests;

class CreateTransactionRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|integer|min:1',
            'type' => 'required|in:income,expense',
            'date' => 'required|date_format:Y-m-d H:i:s'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Field user_id is required!',
            'user_id.integer' => 'Field user_id should be integer!',
            'user_id.exists' => 'User with this id does not exist!',
            'amount.required' => 'Field amount is required!',
            'amount.integer' => 'Field should be integer!',
            'amount.min' => 'Field should be minimal 1!',
            'type.required' => 'Field type is required!',
            'type.in' => 'Field type must be in: income or expense!',
            'date.required' => 'Field type is required!',
            'date.date_format' => 'Field type should have format: Y-m-d H:i:s!',
        ];
    }
}
