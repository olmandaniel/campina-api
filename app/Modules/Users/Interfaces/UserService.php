<?php

namespace App\Modules\Users\Interfaces;

use App\Modules\Users\Models\User;

interface UserService {
    function GetById(string $id): User;

    function GetAll() : array;
}
