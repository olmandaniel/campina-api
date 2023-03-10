<?php

namespace App\Modules\Users\Interfaces;

use App\Modules\Users\Models\User;

interface UserRepository {
    /**
     * @return array<User>
     */
    function GetAll() : array;

    function GetById(string $id): User;
}
