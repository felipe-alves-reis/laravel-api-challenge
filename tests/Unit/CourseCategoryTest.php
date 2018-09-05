<?php

namespace Tests\Unit;

use App\Models\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseCategoryTest extends TestCase
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

    public function createCategory()
    {
        $content = $this->getToken();

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('POST', '/api/categories', ['name' => 'Test Category']);

        return json_decode($response->getContent());
    }

    public function createCourse()
    {
        $content = $this->getToken();

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('POST', '/api/courses', ['name' => 'Test Course']);

        return json_decode($response->getContent());
    }

    public function testSyncCategoriesInCoursesSuccessfully()
    {
        $category = $this->createCategory();
        $course = $this->createCourse();
        $content = $this->getToken();

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('POST', '/api/courses/' . $course->data->id . '/categories', ['categories' => [$category->data->id]]);

        $response->assertStatus(201);
    }

    public function testDeleteCategoriesInCoursesSuccessfully()
    {
        $category = $this->createCategory();
        $course = $this->createCourse();
        $content = $this->getToken();

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $content->token
            ]
        )->json('DELETE', '/api/courses/' . $course->data->id . '/categories/' . $category->data->id, []);

        $response->assertStatus(204);
    }
}
