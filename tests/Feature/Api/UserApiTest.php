<?php

namespace Tests\Feature\Api;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response as HttpResponse;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    protected string $endPoint = '/api/users';
    protected string $paginate = '/api/paginate';

    public function test_get_all_empty(): void
    {
        $response = $this->getJson($this->endPoint);

        $response->assertStatus(HttpResponse::HTTP_OK);
    }

    public function test_get_all(): void
    {
        User::factory()->count(20)->create();

        $response = $this->getJson($this->endPoint);

        $response->assertStatus(HttpResponse::HTTP_OK);
        $response->assertJsonCount(20, 'data');
    }

    public function test_paginate(): void
    {
        User::factory()->count(40)->create();

        $response = $this->getJson($this->paginate);

        $response->assertStatus(HttpResponse::HTTP_OK);
        $response->assertJsonCount(15, 'data');
    }

    public function test_page_two(): void
    {
        User::factory()->count(20)->create();

        $response = $this->getJson("{$this->paginate}?page=2");

        $response->assertStatus(HttpResponse::HTTP_OK);
        $response->assertJsonCount(5, 'data');
    }
}
