<?php

namespace App\Services;

use App\Repositories\CategoryAssetRepository;

class CategoryAssetService
{
    protected $categoryAssetRepository;
    public function __construct(CategoryAssetRepository $categoryAssetRepository)
    {
        $this->categoryAssetRepository = $categoryAssetRepository;
    }
    public function datatables()
    {
        return $this->categoryAssetRepository->datatables();
    }
    public function storeCategoryAsset($data){
        return $this->categoryAssetRepository->create($data);
    }
    public function findCategoryAsset($id){
        return $this->categoryAssetRepository->find($id);
    }
    public function updateCategoryAsset($data,$id){
        return $this->categoryAssetRepository->update($data,$id);
    }
    public function deleteCategoryAsset($id){
        return $this->categoryAssetRepository->delete($id);
    }
}
