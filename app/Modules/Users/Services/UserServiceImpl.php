<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Interfaces\UserRepository;
use App\Modules\Users\Interfaces\UserService;
use App\Modules\Users\Models\User;

class UserServiceImpl implements UserService {
    private readonly UserRepository $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    function GetById(string $id): User
    {
        return $this->repository->GetById($id);
    }

    function GetAll(): array
    {
        return $this->repository->GetAll();
    }
}
