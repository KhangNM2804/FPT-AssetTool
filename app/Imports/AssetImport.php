<?php

namespace App\Imports;

use App\Models\Asset;
use App\Models\AssetDetail;
use App\Models\CategoryAsset;
use App\Models\GroupAsset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AssetImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Bắt đầu từ dòng số 2
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        try {

            DB::beginTransaction();
            $group = GroupAsset::where('name', '=', $row[0])->first();
            $category = CategoryAsset::where('name', '=', $row[1])->first();
            $dateString = $row[11];

            $dateArray = explode('/', $dateString);
            $formattedDateString = $dateArray[2] . '-' . $dateArray[1] . '-' . $dateArray[0];
            $formattedDate = date('d/m/Y', strtotime($formattedDateString));
           
            $asset = new Asset([
                'code' => $row[5],
                'name' => $row[6],
                'user_id' => Auth()->user()->id,
                'quantity' => $row[7],
                'category_asset_id' => $category->id,
                'group_assets_id' => $group->id,
                'price' => $row[8],
                'total_price' => $row[7] * $row[8],
                'document_number' => $row[10],
                'denominator' => $row[2],
                'symbol' => $row[3],
                'unit' => $row[9],
                'invoice_number' => $row[4],
                'material_code' => $row[12],
                'date_of_use' => Carbon::createFromFormat('d/m/Y', $formattedDate),
                'note' => $row[13],
                'status' => Asset::STATUS_ACTIVE
            ]);
            $asset->save();
            $assetDetail = new AssetDetail([
                'asset_id' => $asset->id,
                'quantity' => $asset->quantity,
                'receiver_id' => $asset->user_id,
                'status' => AssetDetail::STATUS_ACTIVE
            ]);
            $assetDetail->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack(); // Nếu có lỗi, rollback transaction
            throw $th;
        }
    }
}
