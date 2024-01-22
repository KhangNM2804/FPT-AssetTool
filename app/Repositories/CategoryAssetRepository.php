<?php

namespace App\Repositories;

use App\Models\CategoryAsset;
use App\Models\CategoryRoom;
use App\Models\Location;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class CategoryAssetRepository
{
    protected $categoryAsset;
    public function __construct(CategoryAsset $categoryAsset)
    {
        $this->categoryAsset = $categoryAsset;
    }

    public function search($data)
    {
        if (isset($data['term'])) {
            return $this->categoryAsset->where('name', 'like', '%' . $data['term'] . '%')->where('status', CategoryAsset::STATUS_ACTIVE)->get('name', 'id');
        }
        return $this->categoryAsset->where('status', CategoryAsset::STATUS_ACTIVE)->limit(10)->get(['name', 'id']);
    }

    public function datatables()
    {
        $category = $this->categoryAsset->query();
        return DataTables::of($category)
            ->addColumn('edit_url', function ($category) {
                return route('staff.asset.category-assets.edit', ['category_asset' => $category]);
            })
            ->addColumn('delete_url', function ($category) {
                return route('staff.asset.category-assets.destroy', ['category_asset' => $category]);
            })
            ->addColumn('created_at', function ($category) {
                return $category->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('updated_at', function ($category) {
                return $category->updated_at->format('Y-m-d H:i:s');
            })
            ->make(true);
    }

    public function create($data)
    {
        return $this->categoryAsset->create($data);
    }
    public function find($id)
    {
        return $this->categoryAsset->findOrFail($id);
    }
    public function update($data, $id)
    {
        $categoryAsset = $this->categoryAsset->findOrFail($id);
        return $categoryAsset->update($data);
    }

    public function delete($id)
    {
        $categoryAsset = $this->categoryAsset->findOrFail($id);
        return $categoryAsset->update(['status' => CategoryRoom::STATUS_INACTIVE]);
    }
}
