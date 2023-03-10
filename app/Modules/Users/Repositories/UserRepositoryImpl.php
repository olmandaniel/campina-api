<?php

namespace App\Modules\Users\Repositories;

use App\Modules\Users\Exceptions\UserNotFoundException;
use App\Modules\Users\Interfaces\UserRepository;
use App\Modules\Users\Models\User;

class UserRepositoryImpl implements UserRepository {
    function GetAll(): array
    {
        $users = User::get();
        return $users->toArray();
    }

    function GetById(string $id): User
    {
        $user = User::find($id);
        if ($user == null) {
            throw new UserNotFoundException();
        }
        return $user;
    }
}
