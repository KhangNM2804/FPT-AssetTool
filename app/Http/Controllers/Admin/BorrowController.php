<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Borrow;
use App\Models\CategoryAsset;
use App\Models\Setting;
use App\Services\BorrowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    protected $borrowService;
    public function __construct(BorrowService $borrowService)
    {
        $this->borrowService = $borrowService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        return $this->borrowService->datatables();
    }
    public function indexClient()
    {
        $setting = Setting::where('key', 'assets_borrowed')->first();
        $categoryAsset = CategoryAsset::whereHas('asset.assetDetail', function ($query) use ($setting) {
            $query->whereIn('id', json_decode($setting->value));
        })->with(['asset', 'asset.assetDetail' => function ($query) use ($setting) {
            $query->whereIn('id', json_decode($setting->value));
        }])->get();
        $categoryAsset->each(function ($categoryAsset) {
            $categoryAsset->sum_quantity = $categoryAsset->asset->flatMap->assetDetail->sum('quantity');
        });
        return view('client.borrow-assets.index', compact('categoryAsset'));
    }
    public function borrowClient()
    {
        $borrows = $this->borrowService->indexClientService();
        return view('client.borrow-assets.borrowIndex', compact('borrows'));
    }

    public function index()
    {
        return view('admin.borrow.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        return $this->borrowService->storeBorrowService($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $this->borrowService->updateStatus($id, Borrow::STATUS_BORROWED);
        return redirect()->back();
    }
    public function return($id)
    {
        $this->borrowService->updateStatus($id, Borrow::STATUS_PAID);
        return redirect()->back();
    }
    public function cancel($id)
    {
        $this->borrowService->updateStatus($id, Borrow::STATUS_CANCELED);
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }

    public function cancelClient($id)
    {
        $this->borrowService->cancelBorrowService($id);
        return redirect()->back();
    }
    public function countPending()
    {
        return $this->borrowService->countBorrowPenddingService();
    }
}
