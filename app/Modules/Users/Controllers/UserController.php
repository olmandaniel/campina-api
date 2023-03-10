<?php

namespace App\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Interfaces\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private readonly UserService $userService;
    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        $user = $this->userService->GetById("");
        return json_encode($user);
    }

    public function showAll()
    {
        $user = $this->userService->GetAll();
        return json_encode($user);
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
