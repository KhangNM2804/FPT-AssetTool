<?php

namespace App\Repositories;

use App\Models\AssetDetail;
use App\Models\Room;
use App\Models\Semester;
use Yajra\DataTables\DataTables;

class DashboardRepository
{
    protected $room;
    public function __construct(Room $room)
    {
        $this->room = $room;
    }
    public function expenseAllDashboard()
    {
        $rooms = Room::with(['assetDetails.asset'])->orderBy('index', 'asc')->get();

        // Duyệt qua từng phòng
        $rooms->transform(function ($room) {
            // Tính tổng chi phí cho từng phòng
            $sumExpend = $room->assetDetails->sum(function ($assetDetail) {
                return $assetDetail->quantity * $assetDetail->asset->price;
            });

            // Thêm cột mới 'sum_expend' vào collection của mỗi phòng
            $room['sum_expend'] = $sumExpend;

            return $room;
        });
        return ['room' => $rooms, 'semester' => null];
    }
    public function expenseHaveFilterDashboard($data)
    {
        $semester = Semester::findOrFail($data['semester_id']);
        $rooms = Room::with(['assetDetails.asset' => function ($query) use ($semester) {
            $query->whereBetween('date_of_use', [$semester->start_at, $semester->end_at]);
        }])->orderBy('index', 'asc')->get();

        // Duyệt qua từng phòng
        $rooms->transform(function ($room) {
            // Tính tổng chi phí cho từng phòng
            $sumExpend = $room->assetDetails->sum(function ($assetDetail) {
                if (isset($assetDetail->asset)) {
                    return $assetDetail->quantity * $assetDetail->asset->price;
                }
                return 0;
            });

            // Thêm cột mới 'sum_expend' vào collection của mỗi phòng
            $room['sum_expend'] = $sumExpend;

            return $room;
        });
        return ['room' => $rooms, 'semester' => $semester];
    }
    public function datatables_selled()
    {
        $assetDetail = AssetDetail::with(['asset.category','room'])->where('status', AssetDetail::STATUS_INACTIVE)->get();
        return DataTables::of($assetDetail)
            ->make(true);
    }
}
