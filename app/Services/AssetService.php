<?php

namespace App\Services;

use App\Repositories\AssetRepository;

class AssetService
{
    protected $assetRepository;
    public function __construct(AssetRepository $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }
    public function getAssetService()
    {
        return $this->assetRepository->getAsset();
    }
}
