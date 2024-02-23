<?php

namespace App\Services;

use App\Repositories\BorrowRepository;

class BorrowService
{
    protected $borrowRepository;
    public function __construct(BorrowRepository $borrowRepository)
    {
        $this->borrowRepository = $borrowRepository;
    }
    public function datatables()
    {
        return $this->borrowRepository->datatables();
    }
    public function indexClientService()
    {
        return $this->borrowRepository->indexClient();
    }
    public function storeBorrowService($data)
    {
        return $this->borrowRepository->create($data);
    }
    public function cancelBorrowService($id)
    {
        return $this->borrowRepository->cancel($id);
    }
    public function updateStatus($id, $status)
    {
        return $this->borrowRepository->updateStatus($id, $status);
    }
}
