<?php

namespace App\Repositories;

use App\Models\Asset;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class AssetRepository
{
    protected $asset;
    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }
    public function datatables()
    {
        $asset = $this->asset->query();
        return DataTables::of($asset)
            ->addColumn('edit_url', function ($asset) {
                return route('staff.asset.asset.edit', ['asset' => $asset]);
            })
            ->addColumn('show_url', function ($asset) {
                return route('staff.asset.asset.show', ['asset' => $asset]);
            })
            ->addColumn('delete_url', function ($asset) {
                return route('staff.asset.asset.destroy', ['asset' => $asset]);
            })
            ->addColumn('invoice', function ($asset) {
                return $asset->invoice;
            })
            ->make(true);
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
        $asset->delete();
        return $asset;
    }
    public function addQuantity(Asset $asset)
    {
        return $asset->save();
    }
}
