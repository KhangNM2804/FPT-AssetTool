<?php

namespace App\Services;

use App\Models\Asset;
use App\Models\AssetDetail;
use App\Repositories\AssetDetailRepository;

class AssetDetailService
{
    protected $assetDetailRepository;
    public function __construct(AssetDetailRepository $assetDetailRepository)
    {
        $this->assetDetailRepository = $assetDetailRepository;
    }
    public function createAssetDetail(Asset $asset)
    {
        return $this->assetDetailRepository->create($asset);
    }
    public function addQuantityAssetDetail($data)
    {
        $asset = Asset::findOrFail($data['asset_id']);
        return $this->assetDetailRepository->addQuantity($asset, $data['quantity']);
    }
    public function mergeAssetDetail($data)
    {
        $asset = Asset::findOrFail($data['asset_id']);
        $sumQuantity = $asset->assetDetail()->whereIn('id', $data['details'])->sum('quantity');
        return $this->assetDetailRepository->mergeQuantity($asset, $data['details'], $sumQuantity);
    }
    public function spiltAssetDetail(AssetDetail $assetDetail, $data)
    {
        if ($assetDetail->quantity > $data['quantity']) {
            $this->assetDetailRepository->splitQuantity($assetDetail, $data);
            return  toastr('Tách tài sản thành công', 'success', 'Thành công');
        }
        return toastr('Số lượng tách lớn hơn số lượng tài sản', 'error', 'Thất bại');
    }
    public function deleteAssetDetail($id)
    {
        $assetDetail = AssetDetail::with('asset')->findOrFail($id);
        $this->assetDetailRepository->delete($assetDetail);
    }
    public function sellAssetDetail($id)
    {
        $assetDetail = AssetDetail::with('asset')->findOrFail($id);
        $this->assetDetailRepository->sell($assetDetail);
        return toastr('Thanh lý tài sản thành công', 'success', 'Thành công');
    }
}
