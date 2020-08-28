<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateTransactionRequest;
use App\Transaction;

class TransactionController extends ApiController
{
    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function create(CreateTransactionRequest $request)
    {
        return parent::add($request);
    }
}
