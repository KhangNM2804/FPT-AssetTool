<?php

namespace App\Repositories;

use App\Models\Borrow;
use App\Models\CategoryAsset;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BorrowRepository
{
    protected $borrow;
    public function __construct(Borrow $borrow)
    {
        $this->borrow = $borrow;
    }
    public function datatables()
    {
        $borrows =  $this->borrow->with(['user', 'details', 'details.category'])->get();
        return DataTables::of($borrows)
            ->addColumn('accept_url', function ($borrow) {
                return route('staff.borrow.accept', ['id' => $borrow->id]);
            })
            ->addColumn('cancel_url', function ($borrow) {
                return route('staff.borrow.cancel', ['id' => $borrow->id]);
            })
            ->addColumn('return_url', function ($borrow) {
                return route('staff.borrow.return', ['id' => $borrow->id]);
            })
            ->make(true);
    }
    public function indexClient()
    {
        $borrows =  $this->borrow->with(['details', 'details.category'])->where('user_id', Auth::user()->id)->get();
        return $borrows;
    }
    public function create($data)
    {
        $start_at = Carbon::parse($data['start_at'])->toDateTimeString();
        $end_at = Carbon::parse($data['end_at'])->toDateTimeString();
        $borrowings = Borrow::with('details')
            ->where(function ($query) use ($start_at, $end_at) {
                $query->whereIn('status', [Borrow::STATUS_BORROWED, Borrow::STATUS_PENDING])->where('start_at', '<=', $start_at)
                    ->where('end_at', '>=', $start_at);
            })
            ->orWhere(function ($query) use ($start_at, $end_at) {
                $query->whereIn('status', [Borrow::STATUS_BORROWED, Borrow::STATUS_PENDING])->where('start_at', '<=', $end_at)
                    ->where('end_at', '>=', $end_at);
            })
            ->orWhere(function ($query) use ($start_at, $end_at) {
                $query->whereIn('status', [Borrow::STATUS_BORROWED, Borrow::STATUS_PENDING])->where('start_at', '>=', $start_at)
                    ->where('end_at', '<=', $end_at);
            })->get();



        $totalQuantities = []; //Tạo 1 mảng chứa các category kèm số lượng đã bị mượn

        // Lặp qua các borrowings
        foreach ($borrowings as $borrow) {
            // Lặp qua các details của borrow
            foreach ($borrow->details as $detail) {
                $category_id = $detail->category_assets_id;
                $quantity = $detail->quantity;
                // Nếu category_id đã tồn tại trong mảng, cộng thêm quantity vào
                if (isset($totalQuantities[$category_id])) {
                    $totalQuantities[$category_id] += $quantity;
                } else {
                    // Nếu chưa tồn tại, khởi tạo với quantity
                    $totalQuantities[$category_id] = $quantity;
                }
            }
        }

        $itemIds = [];

        // Lặp qua mảng $items để lấy các id
        foreach ($data['items'] as $item) {
            // Giải mã chuỗi JSON thành mảng
            $itemArray = json_decode($item, true);

            // Kiểm tra xem có tồn tại key 'id' trong mảng không
            if (isset($itemArray['id'])) {
                $itemIds[] = $itemArray['id'];
            }
        }
        //Lấy các category có thể cho mượn và nằm trong danh sách người dùng mượn
        $setting = Setting::where('key', 'assets_borrowed')->first();
        $categoryAsset = CategoryAsset::whereIn('id', $itemIds)->whereHas('asset.assetDetail', function ($query) use ($setting) {
            $query->whereIn('id', json_decode($setting->value));
        })->with(['asset', 'asset.assetDetail' => function ($query) use ($setting) {
            $query->whereIn('id', json_decode($setting->value));
        }])->get();
        //Cộng số lượng category
        $categoryAsset->each(function ($categoryAsset) {
            $categoryAsset->sum_quantity = $categoryAsset->asset->flatMap->assetDetail->sum('quantity');
        });
        foreach ($categoryAsset as $asset) {
            // Kiểm tra xem id của categoryAsset có trong mảng $totalQuantities không
            if (array_key_exists($asset->id, $totalQuantities)) {
                // Trừ sum_quantity của categoryAsset cho quantity trong $totalQuantities
                $asset->sum_quantity -= $totalQuantities[$asset->id];
                if ($asset->sum_quantity <= 0) {
                    return response()->json([
                        'status' => 422,
                        'message' => 'Tài sản ' . $asset->name . ' không đủ số lượng để mượn!'
                    ]);
                }
            }
        }

        $borrow = $this->borrow->create(['start_at' => $start_at, 'end_at' => $end_at, 'user_id' => Auth::user()->id]);
        foreach ($data['items'] as $item) {
            $item = json_decode($item, true);
            $borrow->details()->create([
                'category_assets_id' => $item['id'],
                'quantity' => $item['quantity']
            ]);
        }
        return response()->json(
            [
                'status' => 200,
                'message' => 'Đăng ký mượn tài sản thành công'
            ],

        );
    }
    public function cancel($id)
    {
        $borrow = $this->borrow->findOrFail($id);
        if ($borrow->status == Borrow::STATUS_PENDING) {
            $borrow->status = Borrow::STATUS_CANCELED;
            $borrow->save();
            toastr('Hủy phiếu đăng ký thành công', 'success', 'Thành công');
        } else {
            toastr('Chỉ được hủy phiếu đang chờ duyệt', 'error', 'Thất bại');
        }
    }
    public function updateStatus($id, $status)
    {
        $borrow = $this->borrow->findOrFail($id);
        if ($status == 2 && $borrow->status == 1) {
            $borrow->status = $status;
            $borrow->save();
            return toastr('Duyệt phiếu đăng ký mượn thành công', 'success', 'Thành công');
        } elseif ($status == 4 && $borrow->status == 1) {
            $borrow->status = $status;
            $borrow->save();
            return toastr('Hủy phiếu đăng ký mượn thành công', 'success', 'Thành công');
        } elseif ($status == 3 && $borrow->status == 2) {
            $borrow->status = $status;
            $borrow->save();
            return toastr('Đã đánh dấu trả tài sản thành công', 'success', 'Thành công');
        }
        return toastr('Cập nhật trạng thái phiếu đăng ký thất bại', 'error', 'Thất bại');
    }
    public function countPending()
    {
        return $this->borrow->where('status', Borrow::STATUS_PENDING)->count();
    }
}
