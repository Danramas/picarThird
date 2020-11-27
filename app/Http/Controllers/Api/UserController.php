<?php

namespace App\Http\Controllers\Api;

use App\Contracts\IUserService;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(
        IUserService $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        $users = $this->userService->getAllUsers();

        return $users;
    }
}
