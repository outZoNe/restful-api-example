<?php

namespace App\Http\Requests;

class CreateUserRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required|min:3|max:255|unique:users',
            'currency' => 'required|min:3|max:3|in:AUD,GBP,BYR,DKK,USD,EUR,ISK,KZT,RUB',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'Field NickName is required!',
            'nickname.min' => 'Field NickName length min is 3 symbols!',
            'nickname.max' => 'Field NickName length max is 255 symbols!',
            'nickname.unique' => 'This nickname is already taken!',
            'currency.required' => 'Field currency is required!',
            'currency.min' => 'Field currency length min is 3 symbols!',
            'currency.max' => 'Field currency length max is 3 symbols!',
            'currency.in' => 'Field currency must be in: AUD,GBP,BYR,DKK,USD,EUR,ISK,KZT,RUB!',
        ];
    }
}
