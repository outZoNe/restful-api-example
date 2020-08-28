<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Генерируем транзакции для пользователей
     * у каждого пользователя будет от 1 до 10 транзакций
     *
     * @return void
     */
    public function run()
    {
        $transactionTypes = ['income', 'expense'];
        $faker = Faker\Factory::create();

        foreach (User::all() as $user) {
            foreach (range(1, mt_rand(10, 30)) as $el) {
                Transaction::create([
                    'user_id' => $user->id,
                    'amount' => mt_rand(0, 500000),
                    'type' => $transactionTypes[array_rand($transactionTypes)],
                    'date' => $faker->date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
