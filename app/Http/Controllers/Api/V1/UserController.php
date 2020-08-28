<?php

namespace App\Http\Controllers\Api\V1;

use App\ExchangeRate;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\GetTransactionsByUserIdRequest;
use App\User;

class UserController extends ApiController
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(CreateUserRequest $request)
    {
        return parent::add($request);
    }

    public function get(GetTransactionsByUserIdRequest $request)
    {
        $data = $request->validated();

        $user = User::find($data['user_id']);
        $transactions = $user->transactions()->orderBy('date', $data['sort_by_date'])->paginate(10)->map(function ($el) use ($user) {
            return [
                'date' => $el['date'],
                'amount' => round($el['amount'] * ($user['currency'] != 'RUB' ? ExchangeRate::orderByDesc('date')->first()[strtolower($user['currency'])] : 1), 4),
                'type' => $el['type']
            ];
        });

        return response()->json($transactions, 200);
    }
}
