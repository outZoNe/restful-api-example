<?php

namespace App\Services\Contracts;

interface TransactionServiceContract
{
    public function getTransactionByUserId(array $data);

    public function getTransactionByDate(array $data);
}
