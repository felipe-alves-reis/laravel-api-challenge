<?php

namespace Tests\Unit;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function getToken()
    {
        $responseToken = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        )->json('POST', '/api/login', ['username' => 'admin', 'password' => 'secret']);

        return json_decode($responseToken->getContent());
    }

    public function testCreateCategorySuccessfully()
    {
        $content = $this->getToken();

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
            )->json('POST', '/api/categories', ['name' => 'Test Category']);

        $response->assertStatus(201);
    }

    public function testDeleteCategorySuccessfully()
    {
        $content = $this->getToken();

        $responseUser = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('POST', '/api/categories', ['name' => 'Test Category']);

        $contentUser = json_decode($responseUser->getContent());

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('DELETE', '/api/categories/'. $contentUser->data->id, []);

        $response->assertStatus(204);
    }
}
