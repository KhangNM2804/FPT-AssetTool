<?php

namespace App\Services;

use App\Repositories\SemesterRepository;

class SemesterService
{
    protected $semesterRepository;
    public function __construct(SemesterRepository $semesterRepository)
    {
        $this->semesterRepository = $semesterRepository;
    }

    public function datatables()
    {
        return $this->semesterRepository->datatables();
    }
    public function searchSemester($data)
    {
        return $this->semesterRepository->search($data);
    }
    public function storeSemesterService($data)
    {
        return $this->semesterRepository->create($data);
    }
    public function findSemesterService($id)
    {
        return $this->semesterRepository->find($id);
    }
    public function updateSemesterService($data, $id)
    {
        return $this->semesterRepository->update($data, $id);
    }
    public function deleteSemesterService($id)
    {
        return $this->semesterRepository->delete($id);
    }
}
