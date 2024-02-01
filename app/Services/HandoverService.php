<?php

namespace App\Services;

use App\Repositories\HandoverRepository;

class HandoverService
{
    protected $handoverRepository;
    public function __construct(HandoverRepository $handoverRepository)
    {
        $this->handoverRepository = $handoverRepository;
    }
    public function createHandover($data)
    {
        return $this->handoverRepository->create($data);
    }
    public function deleteHandover($id)
    {
        return $this->handoverRepository->delete($id);
    }
    public function saveHandover($data){
       return $this->handoverRepository->save($data);
    }
}
