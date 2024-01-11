<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function search()
    {
        return $this->user->get(['id', 'name']);
    }
}
