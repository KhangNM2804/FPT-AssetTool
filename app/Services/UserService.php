<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function search($data)
    {
        return $this->userRepository->search($data);
    }
    public function datatables()
    {
        return $this->userRepository->datatables();
    }
    public function editService($id)
    {
        return $this->userRepository->find($id);
    }
    public function updateRoleService($id, $data)
    {
        return $this->userRepository->updateRole($id, $data);
    }
}
