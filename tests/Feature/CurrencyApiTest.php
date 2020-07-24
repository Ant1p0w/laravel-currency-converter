<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CurrencyApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFirst()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testCurrencyList()
    {
        $response = $this->get('/api/currency');
        $response->assertStatus(200)
            ->assertJsonStructure([
                0 => [
                    "id",
                    "name",
                    "rate" => [
                        "id",
                        "currency_id",
                        "rate",
                    ]
                ]
            ]);
    }

    public function testCurrencyRates()
    {
        $response = $this->get('/api/currency/rates');
        $response->assertStatus(200)
            ->assertJsonStructure([
                0 => [
                    "id",
                    "currency_id",
                    "rate",
                    "currency" => [
                        "id",
                        "name",
                    ]
                ]
            ]);
    }
}
