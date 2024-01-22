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
    public function search($data)
    {
        if(isset($data['term'])){
            return $this->user->where('name','like','%'.$data['term'].'%')->get(['id', 'name']);
        }
        return $this->user->limit(3)->get(['id', 'name']);
    }
}
