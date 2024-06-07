<?php

namespace app\Repository\Contracts;

interface UserRepositoryInterface
{
    public function findAll(): array;
}
