<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\GetTransactionsByDateRequest;
use App\Services\Contracts\TransactionServiceContract;
use App\User;

class TransactionController extends ApiController
{
    private $transactionServiceContract;

    public function __construct(User $model, TransactionServiceContract $transactionServiceContract)
    {
        $this->transactionServiceContract = $transactionServiceContract;
        $this->model = $model;
    }

    public function create(CreateTransactionRequest $request)
    {
        return parent::add($request);
    }

    public function get(GetTransactionsByDateRequest $request)
    {
        $data = $request->validated();

        return response()->json($this->transactionServiceContract->getTransactionByDate($data), 200);
    }
}
