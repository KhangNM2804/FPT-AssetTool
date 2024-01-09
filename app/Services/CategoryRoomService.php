<?php

namespace App\Services;

use App\Repositories\CategoryRoomRepository;

class CategoryRoomService
{
    protected $categoryRoomRepository;
    public function __construct(CategoryRoomRepository $categoryRoomRepository)
    {
        $this->categoryRoomRepository = $categoryRoomRepository;
    }
    public function getAllRoomCategoryService()
    {
        return $this->categoryRoomRepository->getAll();
    }
    public function createCategoryRoom($data)
    {
        return $this->categoryRoomRepository->create($data);
    }
    public function findCategoryRoom($id)
    {
        return $this->categoryRoomRepository->find($id);
    }
    public function updateCategoryRoom($data, $id)
    {
        return $this->categoryRoomRepository->update($data, $id);
    }
    public function deleteCategoryCategoryRoom($id)
    {
        return $this->categoryRoomRepository->delete($id);
    }
}
