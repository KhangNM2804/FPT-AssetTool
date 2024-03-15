<?php

namespace App\Repositories;

use App\Models\Asset;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class AssetRepository
{
    protected $asset;
    protected $gate;
    public function __construct(Asset $asset, GateContract $gate)
    {
        $this->asset = $asset;
        $this->gate = $gate;
    }
    public function datatables($data)
    {
        $asset = $this->asset->with(['assetDetail.room']);
        if (isset($data['category_id'])) {
            $asset->where('category_asset_id', $data['category_id']);
        }
        if (isset($data['group_id'])) {
            $asset->where('group_assets_id', $data['group_id']);
        }
        return DataTables::of($asset)
            ->addColumn('edit_url', function ($asset) {
                if ($this->gate->allows('update', $asset)) {
                    return route('staff.asset.asset.edit', ['asset' => $asset]);
                } else {
                    return null;
                }
            })
            ->addColumn('show_url', function ($asset) {
                if ($this->gate->allows('view', $asset)) {
                    return route('staff.asset.asset.show', ['asset' => $asset]);
                } else {
                    return null;
                }
            })
            ->addColumn('delete_url', function ($asset) {
                if ($this->gate->allows('delete', $asset)) {
                    return route('staff.asset.asset.destroy', ['asset' => $asset]);
                } else {
                    return null;
                }
            })
            ->addColumn('invoice', function ($asset) {
                return $asset->invoice;
            })
            ->make(true);
    }
    public function export($data)
    {
        $asset = $this->asset->with(['category','group','assetDetail.room']);
        if (isset($data['category_id'])) {
            $asset->where('category_asset_id', $data['category_id']);
        }
        if (isset($data['group_id'])) {
            $asset->where('group_assets_id', $data['group_id']);
        }
        return $asset->get();
    }
    public function create($data)
    {
        return $this->asset->create($data);
    }
    public function find($id)
    {
        return $this->asset->findOrFail($id);
    }
    public function show($id)
    {
        return $this->asset->with(['category:id,name', 'group:id,name', 'assetDetail.reciver:id,name', 'assetDetail.room:id,name'])->findOrFail($id);
    }
    public function update($data, $id)
    {
        $asset = $this->asset->findOrFail($id);
        $data['total_price'] = $asset->quantity * $data['price'];
        if (isset($data['image'])) { //kiểm tra có cập nhật ảnh mới hay không. Nếu có thì xóa ảnh cũ khỏi web
            Storage::delete('public/uploads/' . $asset->image);
        }
        return $asset->update($data);
    }
    public function delete($id)
    {
        $asset = $this->asset->findOrFail($id);
        if ($asset->status == Asset::STATUS_ACTIVE) {
            $asset->delete();
            toastr('Xóa thành công', 'success', 'Thành công');
        } else {
            toastr('Xóa thất bại', 'error', 'Thất bại');
        }

        return $asset;
    }
    public function addQuantity(Asset $asset)
    {
        return $asset->save();
    }
}
