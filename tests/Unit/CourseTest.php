<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
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

    public function testCreateCourseSuccessfully()
    {
        $content = $this->getToken();

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('POST', '/api/courses', ['name' => 'Test Course']);

        $response->assertStatus(201);
    }

    public function testDeleteCourseSuccessfully()
    {
        $content = $this->getToken();

        $responseUser = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('POST', '/api/courses', ['name' => 'Test Course']);

        $contentUser = json_decode($responseUser->getContent());

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('DELETE', '/api/courses/'. $contentUser->data->id, []);

        $response->assertStatus(204);
    }
}
