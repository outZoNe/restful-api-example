<?php

namespace App\Services;

use App\ExchangeRate;
use App\Services\Contracts\TransactionServiceContract;
use App\Transaction;
use App\User;

class TransactionService implements TransactionServiceContract
{
    public function getTransactionByUserId(array $data)
    {
        $user = User::find($data['user_id']);
        return $user->transactions()->orderBy('date', $data['sort_by_date'])->paginate(10)->map(function ($el) use ($user) {
            return [
                'date' => $el['date'],
                'amount' => round($el['amount'] * ($user['currency'] != 'RUB' ? ExchangeRate::orderByDesc('date')->first()[strtolower($user['currency'])] : 1), 4),
                'type' => $el['type']
            ];
        });
    }

    public function getTransactionByDate(array $data)
    {
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

        return [
            'date' => $data['date'],
            'income_sum' => rand($incomeSum, 4),
            'expense_sum' => rand($expenseSum, 4)
        ];
    }
}
