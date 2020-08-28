<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTransactionByUserIdTest extends TestCase
{
    /**
     * A basic feature qwd.
     *
     * @return void
     */
    public function testGetTransactionByUserId()
    {
        $response = $this->json('GET', '/api/get-transactions/user?page=1', [
            'user_id' => mt_rand(1, 50),
            'sort_by_date' => 'ASC'
        ]);

        $response->assertStatus(200)->assertJsonStructure([['date', 'amount', 'type']]);
    }
}
