<?php

namespace app\Repository\Contracts;

use Hamcrest\Type\IsBoolean;

interface UserRepositoryInterface
{
    public function findAll(): array;
    public function create(array $data): object;
    public function update(string $email, array $data): object;
    public function delete(string $email): bool;
    public function findByEmail(string $email): ?object;
}
