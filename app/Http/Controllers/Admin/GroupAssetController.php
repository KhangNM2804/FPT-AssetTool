<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupAssetsRequest;
use App\Models\GroupAsset;
use App\Services\GroupAssetService;
use Illuminate\Http\Request;

class GroupAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $groupAssetService;
    public function __construct(GroupAssetService $groupAssetService)
    {
        $this->groupAssetService = $groupAssetService;
    }

    public function index()
    {
        return view('admin.group-asset.index');
    }
    public function datatables()
    {
        return $this->groupAssetService->datatables();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = new GroupAsset();
        $group->status = 1;
        return view('admin.group-asset.store', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupAssetsRequest $request)
    {
        $data = $request->all();
        try {
            $this->groupAssetService->storeGroupAsset($data);
            toastr('Thêm nhóm tài sản thành công', 'success', 'Thành công');
            return redirect(route('staff.asset.group-assets.index'));
        } catch (\Throwable $th) {
            toastr('Thêm nhóm tài sản thất bại', 'error', 'Thất bại');
            return redirect()->back();
        }
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
        $group = $this->groupAssetService->findGroupAsset($id);
        return view('admin.group-asset.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroupAssetsRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->groupAssetService->updateGroupAsset($data, $id);
            toastr('Cập nhật nhóm tài sản thành công', 'success', 'Thành công');
            return redirect(route('staff.asset.group-assets.index'));
        } catch (\Throwable $th) {
            toastr('Cập nhật thất bại', 'error', 'Thất bại');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->groupAssetService->deleteGroupAsset($id);
            toastr('Xóa nhóm tài sản thành công', 'success', 'Thành công');
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr('Xóa nhóm tài sản thất bại', 'error', 'Thất bại');
            return redirect()->back();
        }
    }
}
