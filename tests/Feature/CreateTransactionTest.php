<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTransactionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $types = collect(['income', 'expense']);
        $response = $this->json('POST', '/api/create/transaction', [
            'user_id' => mt_rand(1, 50),
            'amount' => mt_rand(5000, 50000),
            'type' => $types[mt_rand(0, $types->count() - 1)],
            'date' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $response->assertStatus(200)->assertJsonStructure(['id']);
    }
}
