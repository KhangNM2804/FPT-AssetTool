<?php

namespace App\Repositories;

use App\Models\Asset;

use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class AssetRepository
{
    public function getAsset()
    {
        $asset = Asset::with(['user', 'category', 'location' => function ($query) {
            $query->where('id', Session::get('locationSession'));
        }])->where('status', Asset::STATUS_ACTIVE);

        return DataTables::of($asset)
            ->addColumn('edit_url', function ($asset) {
                return route('staff.assets.edit', ['asset' => $asset]);
            })
            ->addColumn('delete_url', function ($asset) {
                return route('staff.assets.destroy', ['asset' => $asset]);
            })
            ->make(true);
    }
}
