<?php

namespace Tests\Feature\App\Repository\Eloquent;

use App\Repository\Contracts\UserRepositoryInterface;
use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function teste_implements_interface()
    {
        $this->assertInstanceOf(
            UserRepositoryInterface::class,
            new UserRepository(new User())
        );
    }

    public function test_find_all_empty(): void
    {

        $repository = new UserRepository(new User());
        $response = $repository->findAll();

        $this->assertIsArray($response);
    }
}
