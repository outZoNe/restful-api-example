<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTransactionByDateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTransactionByDate()
    {
        $response = $this->json('GET', '/api/get-transactions/date', [
            'date' => '1970-01-01'
        ]);

        $response->assertStatus(200)->assertJsonStructure(['date', 'income_sum', 'expense_sum']);
    }

}
