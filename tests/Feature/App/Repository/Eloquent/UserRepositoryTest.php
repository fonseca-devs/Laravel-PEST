<?php

namespace Tests\Feature\App\Repository\Eloquent;

use App\Repository\Contracts\UserRepositoryInterface;
use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Database\QueryException;
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

    public function teste_create_exception()
    {
        $this->expectException(QueryException::class);

        $data = [
            "name" => "Bruno Oliveira",
            "idade" => 23

        ];

        $this->repository->create($data);
    }

    public function teste_update()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'NAME TESTE'
        ];

        $response = $this->repository->update($user->email, $data);

        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertDatabaseHas('users', [
            'name' => 'NAME TESTE'
        ]);

    }

    public function teste_delete()
    {
        $user = User::factory()->create();

        $deleted = $this->repository->delete($user->email);
        dump($deleted);
        $this->assertTrue($deleted);
        $this->assertSoftDeleted('users', [
            'email' => $user->email
        ]);

    }
}
