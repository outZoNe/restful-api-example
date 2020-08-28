<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $faker = Factory::create();
        $currency = collect(['AUD', 'GBP', 'DKK', 'USD', 'EUR', 'KZT', 'RUB']);
        $response = $this->json('POST', '/api/create/user', [
            'nickname' => $faker->userName,
            'currency' => $currency[mt_rand(0, $currency->count() - 1)]
        ]);

        $response->assertStatus(200)->assertJsonStructure(['id']);
    }
}
