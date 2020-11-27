<?php

namespace App\Services;

use App\Contracts\IUserService;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserService implements IUserService
{
    public function getAllUsers(): Collection
    {
        return User::all();
    }
}
