<?php

namespace App\Services;

use App\Repositories\GroupAssetRepository;

class GroupAssetService
{
    protected $groupAssetRepsitory;
    public function __construct(GroupAssetRepository $groupAssetRepsitory)
    {
        $this->groupAssetRepsitory = $groupAssetRepsitory;
    }
    public function datatables()
    {
        return $this->groupAssetRepsitory->datatables();
    }
    public function storeGroupAsset($data)
    {
        return $this->groupAssetRepsitory->create($data);
    }
    public function findGroupAsset($id)
    {
        return $this->groupAssetRepsitory->find($id);
    }
    public function updateGroupAsset($data, $id)
    {
        return $this->groupAssetRepsitory->update($data, $id);
    }
    public function deleteGroupAsset($id)
    {
        return $this->groupAssetRepsitory->delete($id);
    }
}
