<?php

namespace Tests\Feature\App\Repository\Eloquent;

use App\Repository\Contracts\UserRepositoryInterface;
use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    protected UserRepository $repository;

    public function setUp() :void {

        $this->repository = new UserRepository(new User());

        parent::setUp();
    }

    public function teste_implements_interface()
    {
        $this->assertInstanceOf(
            UserRepositoryInterface::class,
            $this->repository
        );
    }

    public function test_find_all_empty(): void
    {

        $response = $this->repository->findAll();

        $this->assertIsArray($response);
    }

    public function teste_create()
    {
        $data = [
            "name" => "Bruno Oliveira",
            "idade" => 23,
            "email" => "brunobromo321@gmail.com"
        ];

        $response = $this->repository->create($data);

        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertDatabaseHas('users', [
            'email' => 'brunobromo321@gmail.com',
        ]);
    }
}
