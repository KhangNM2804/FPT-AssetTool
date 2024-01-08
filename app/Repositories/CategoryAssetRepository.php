<?php

namespace App\Repositories;

use App\Models\CategoryAsset;
use App\Models\Location;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class CategoryAssetRepository
{
    public function getCategoryAsset()
    {
        $category = CategoryAsset::with(['user', 'location' => function ($query) {
            $query->where('id', Session::get('locationSession'));
        }])->where('status', CategoryAsset::STATUS_ACTIVE);
        return DataTables::of($category)
            ->addColumn('edit_url', function ($category) {
                return route('staff.category_asset.edit', ['category_asset' => $category]);
            })
            ->addColumn('delete_url', function ($category) {
                return route('staff.category_asset.destroy', ['category_asset' => $category]);
            })
            ->addColumn('created_at', function ($category) {
                return $category->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('updated_at', function ($category) {
                return $category->updated_at->format('Y-m-d H:i:s');
            })
            ->make(true);
    }

    public function storeCategory($data)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        $location->categoryAsset()->create($data);
        return $location;
    }
    public function findCategory($id)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        $category = $location->categoryAsset()->findOrFail($id);
        return $category;
    }
    public function updateCategory($data, $id)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        return $category = $location->categoryAsset()->where('id', $id)->update(['name' => $data['name']]);
    }

    public function deleteCategory($id)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        return $category = $location->categoryAsset()->where('id', $id)->update(['status' => 0]);
    }
}
