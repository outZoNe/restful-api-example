<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\GetTransactionsByUserIdRequest;
use App\User;
use App\Services\Contracts\TransactionServiceContract;

class UserController extends ApiController
{
    private $transactionServiceContract;

    public function __construct(User $model, TransactionServiceContract $transactionServiceContract)
    {
        $this->transactionServiceContract = $transactionServiceContract;
        $this->model = $model;
    }

    public function create(CreateUserRequest $request)
    {
        return parent::add($request);
    }

    public function get(GetTransactionsByUserIdRequest $request)
    {
        $data = $request->validated();

        return response()->json($this->transactionServiceContract->getTransactionByUserId($data), 200);
    }
}
