<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\UserRepositoryInterface;
use App\Repository\Exceptions\NotFoundException;
use Exception;
use PhpParser\Node\Expr\Throw_;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;

    }

    public function findAll(): array
    {
        return $this->model->get()->toArray();
    }

    public function paginate()
    {
        return $this->model->paginate(15);
    }

    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    public function update(string $email, array $data): object
    {
        $user = $this->model->where('email', $email)->first();

        $user->update($data);

        $user->refresh();

        return $user;
    }

    public function delete(string $email): bool
    {
        $user = $this->model->where('email', $email)->first();
        if(!$user){
            throw new NotFoundException("User not found");
        }
        return $user->delete();

    }

    public function findByEmail(string $email): ?object
    {
        return $this->model->where('email', $email)->first();

    }
}
