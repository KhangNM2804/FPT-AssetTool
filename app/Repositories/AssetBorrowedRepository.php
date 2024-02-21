<?php

namespace App\Repositories;

use App\Models\AssetDetail;
use App\Models\Setting;
use Yajra\DataTables\Facades\DataTables;

class AssetBorrowedRepository
{
    protected $assetDetail;

    public function __construct(AssetDetail $assetDetail)
    {
        $this->assetDetail = $assetDetail;
    }

    public function datatables()
    {
        $setting = Setting::where('key', 'assets_borrowed')->first();
        $assetIds = json_decode($setting->value);
        $details = $this->assetDetail::with(['asset', 'room'])->whereIn('id',  $assetIds)->where('status', AssetDetail::STATUS_ACTIVE);
        return DataTables::of($details)
            ->addColumn('delete_url', function ($detail) {
                return route('staff.asset.borrowed-asset.destroy', ['borrowed_asset' => $detail]);
            })
            ->make(true);
    }
}
