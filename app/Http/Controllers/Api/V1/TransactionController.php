<?php

namespace App\Http\Controllers\Api\V1;

use App\ExchangeRate;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\GetTransactionsByDateRequest;
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

    public function get(GetTransactionsByDateRequest $request)
    {
        $data = $request->validated();

        $incomeSum = 0;
        $expenseSum = 0;
        foreach (Transaction::with('user')->whereDate('date', $data['date'])->get() as $el) {
            switch ($el['type']) {
                case 'income':
                    $incomeSum += $el['amount'] * ($el->user['currency'] != 'RUB' ? ExchangeRate::orderByDesc('date')->first()[strtolower($el->user['currency'])] : 1);
                    break;
                case 'expense' :
                    $expenseSum += $el['amount'] * ($el->user['currency'] != 'RUB' ? ExchangeRate::orderByDesc('date')->first()[strtolower($el->user['currency'])] : 1);
                    break;
            }
        }

        return response()->json([
            'date' => $data['date'],
            'income_sum' => rand($incomeSum, 4),
            'expense_sum' => rand($expenseSum, 4)
        ]);
    }
}
