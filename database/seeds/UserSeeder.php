<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Генерируем 50 рандомных пользователей.
     *
     * @return void
     */
    public function run()
    {
        $currency = ['AUD', 'GBP', 'DKK', 'USD', 'EUR', 'KZT', 'RUB'];
        $faker = Faker\Factory::create();

        foreach (range(1, 50) as $el) {
            User::create([
                'nickname' => $faker->userName,
                'currency' => $currency[array_rand($currency)]
            ]);
        }
    }
}
