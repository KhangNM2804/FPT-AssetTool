<?php

namespace App\Repositories;

use App\Models\GroupAsset;
use Yajra\DataTables\DataTables;

class GroupAssetRepository
{
    protected $groupAsset;
    public function __construct(GroupAsset $groupAsset)
    {
        $this->groupAsset = $groupAsset;
    }
    public function search($data)
    {
        if (isset($data['term'])) {
            return $this->groupAsset->where('name', 'like', '%' . $data['term'] . '%')->where('status', GroupAsset::STATUS_ACTIVE)->get(['name', 'id']);
        }
        return $this->groupAsset->where('status', GroupAsset::STATUS_ACTIVE)->get(['name', 'id']);
    }
    public function datatables()
    {
        $groups = $this->groupAsset->query();
        return DataTables::of($groups)
            ->addColumn('created_at', function ($group) {
                return $group->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('edit_url', function ($group) {
                return route('staff.asset.group-assets.edit', ['group_asset' => $group]);
            })
            ->addColumn('delete_url', function ($group) {
                return route('staff.asset.group-assets.destroy', ['group_asset' => $group]);
            })
            ->make(true);
    }
    public function create($data)
    {
        return $this->groupAsset->create($data);
    }
    public function find($id)
    {
        return $this->groupAsset->findOrFail($id);
    }
    public function update($data, $id)
    {
        $groupAsset = $this->groupAsset->findOrFail($id);
        return $groupAsset->update($data);
    }
    public function delete($id)
    {
        $groupAsset = $this->groupAsset->findOrFail($id);
        $groupAsset->update(['status' => GroupAsset::STATUS_INACTIVE]);
        return $groupAsset;
    }
}
