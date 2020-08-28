<?php

namespace App\Http\Requests;

class GetTransactionsByUserIdRequest extends ApiRequest
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
            'sort_by_date' => 'required|in:ASC,DESC',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Field user_id is required!',
            'user_id.integer' => 'Field user_id should be integer!',
            'user_id.exists' => 'User with this id does not exist!',
            'sort_by_date.required' => 'Field sort_by_date is required!',
            'sort_by_date.in' => 'Field sort_by_date should be minimal ASC or DESC!',
        ];
    }
}
