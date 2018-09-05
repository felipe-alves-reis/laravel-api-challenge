<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateCategory()
    {
        $responseToken = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
            )->json('POST', '/api/login', ['username' => 'admin', 'password' => 'secret']);

        dd($responseToken->token);

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '
            ]
            )->json('POST', '/api/categories', ['name' => 'Test Category']);

        $response->assertStatus(201);
    }
}
