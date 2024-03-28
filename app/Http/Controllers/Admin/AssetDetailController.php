<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MergeAssetDetailRequest;
use App\Http\Requests\StoreAssetDetailRequest;
use App\Models\Asset;
use App\Models\AssetDetail;
use App\Services\AssetDetailService;
use App\Services\AssetService;
use Illuminate\Http\Request;

class AssetDetailController extends Controller
{
    protected $assetDetailService;
    protected $assetService;
    public function __construct(AssetDetailService $assetDetailService, AssetService $assetService)
    {
        $this->assetDetailService = $assetDetailService;
        $this->assetService = $assetService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreAssetDetailRequest $request)
    {
        $this->authorize('update', Asset::findOrFail($request->asset_id));
        try {
            $data = $request->all();
            $this->assetService->addQuantity($data);
            $result = $this->assetDetailService->addQuantityAssetDetail($data);
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Thành công',
                    'data' => $result
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => 422,
                    'message' => 'Thất bại',
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function merge(MergeAssetDetailRequest $request)
    {
        $this->authorize('update', Asset::findOrFail($request->asset_id));
        $data = $request->all();
        $result = $this->assetDetailService->mergeAssetDetail($data);
        return $result;
    }
    public function split(AssetDetail $detail, Request $request)
    {
        $this->authorize('update', $detail);
        $data = $request->all();
        $this->assetDetailService->spiltAssetDetail($detail, $data);
        return redirect()->back();
    }
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
    public function destroy($id)
    {
        $this->authorize('delete', AssetDetail::with('asset')->findOrFail($id));
        try {

            $this->assetDetailService->deleteAssetDetail($id);
            toastr('Xóa thành công', 'success', 'Thành công');
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr('Xóa thất bại', 'error', 'Thất bại');
            return redirect()->back();
        }
    }
    public function sell($id)
    {
        $this->authorize('update', AssetDetail::with('asset')->findOrFail($id));
        try {
            $this->assetDetailService->sellAssetDetail($id);
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr('Thanh lý thất bại', 'error', 'Thất bại');
        }
        return redirect()->back();
    }
}
