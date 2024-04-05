<?php

namespace App\Repositories;

use App\Models\Asset;
use App\Models\AssetDetail;
use App\Models\Setting;
use Illuminate\Support\Collection;

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
            $count =  $asset->assetDetail()->where('status', AssetDetail::STATUS_ACTIVE)->count();
            if ($count == 0) {
                $asset->update(['status' => Asset::STATUS_INACTIVE]);
                $asset->save();
            }
            return redirect()->back();
        }
    }
    public function sell(AssetDetail $assetDetail)
    {
        $asset = $assetDetail->asset;
        $assetDetail->update(['status' => AssetDetail::STATUS_INACTIVE]);
        $assetDetail->handover()->delete();
        $count =  $asset->assetDetail()->where('status', AssetDetail::STATUS_ACTIVE)->count();
        $setting = Setting::where('key', 'assets_borrowed')->first();


        $value = json_decode($setting->value, true);
        if (!is_array($value)) {
            $value = [];
        }

        // Tìm kiếm và xóa phần tử khỏi mảng
        $key = array_search($assetDetail->id, $value);
        if ($key !== false) {
            unset($value[$key]);
        }

        // Chuyển đổi mảng kết hợp thành mảng chỉ số
        $value = array_values($value);

        // Lưu lại giá trị mới cho thuộc tính 'value'
        $setting->value = json_encode($value);

        // Lưu lại đối tượng Setting
        $setting->save();
        if ($count == 0) {
            $asset->update(['status' => Asset::STATUS_INACTIVE]);
        }
    }
}
