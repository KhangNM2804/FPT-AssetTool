<?php

namespace App\Repositories;

use App\Models\Asset;
use App\Models\AssetDetail;

class AssetDetailRepository
{
    protected $assetDetail;

    public function __construct(AssetDetail $assetDetail)
    {
        $this->assetDetail = $assetDetail;
    }

    public function create(Asset $asset)
    {
        $data['asset_id'] = $asset->id;
        $data['quantity'] = $asset->quantity;
        $data['receiver_id'] = $asset->user_id;
        $data['status'] = $asset->status;
        return $this->assetDetail->create($data);
    }
    public function addQuantity(Asset $asset, $quantity)
    {
        $assetDetail = $asset->assetDetail()->create([
            'quantity' => $quantity,
            'receiver_id' => $asset->user_id
        ]);
        return $assetDetail;
    }
    public function mergeQuantity(Asset $asset, $idDetails, $quantity)
    {
        $asset->assetDetail()->whereIn('id', $idDetails)->delete();
        $asset->assetDetail()->create([
            'quantity' => $quantity,
            'receiver_id' => $asset->user_id
        ]);
    }
    public function splitQuantity(AssetDetail $assetDetail, $data)
    {
        $assetDetail->update(['quantity' => $assetDetail->quantity - $data['quantity']]);
        $asset = Asset::findOrFail($assetDetail->asset_id);
        $asset->assetDetail()->create([
            'quantity' => $data['quantity'],
            'receiver_id' => $asset->user_id
        ]);
    }
    public function delete(AssetDetail $assetDetail)
    {
        $asset = $assetDetail->asset;
        $newQuantity = $asset->quantity - $assetDetail->quantity;
        if ($newQuantity == 0) {
            $asset->delete();
            return redirect(route('staff.asset.asset-detail.index'));
        } else {
            $asset->update(['quantity' => $newQuantity, 'total_price' => $newQuantity * $asset->price]);
            $assetDetail->handover()->delete();
            $assetDetail->delete();
            return redirect()->back();
        }
    }
    public function buy(AssetDetail $assetDetail)
    {
        $asset = $assetDetail->asset;
        $assetDetail->update(['status' => AssetDetail::STATUS_INACTIVE]);
        $assetDetail->handover()->delete();
        $count =  $asset->assetDetail()->where('status', AssetDetail::STATUS_ACTIVE)->count();

        if ($count == 0) {
            $asset->update(['status' => Asset::STATUS_INACTIVE]);
        }
        
    }
}
