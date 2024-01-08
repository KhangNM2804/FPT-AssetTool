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
    public function getCategoryAssetService()
    {
        return $this->categoryAssetRepository->getCategoryAsset();
    }
    public function storeCategoryAssetService($data){
        return $this->categoryAssetRepository->storeCategory($data);
    }
    public function findCategoryAssetService($id){
        return $this->categoryAssetRepository->findCategory($id);
    }
    public function updateCategoryAssetService($data,$id){
        return $this->categoryAssetRepository->updateCategory($data,$id);
    }
    public function deleteCategoryAssetService($id){
        return $this->categoryAssetRepository->deleteCategory($id);
    }
}
