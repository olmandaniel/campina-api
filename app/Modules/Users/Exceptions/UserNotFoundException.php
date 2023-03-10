<?php

namespace App\Modules\Users\Exceptions;

use Exception;

class UserNotFoundException extends Exception {
    function __construct(){
        parent::__construct("User not found", 404);
    }
}
