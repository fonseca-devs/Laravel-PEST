<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repository\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(){

        $data = collect($this->repository->findAll());

        return UserResource::collection($data);

    }

    public function paginate(){

        $data = $this->repository->paginate();

        return UserResource::collection($data);

    }
}
