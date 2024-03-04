<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryAssetRequest;
use App\Http\Requests\StoreGroupAssetsRequest;
use App\Models\CategoryAsset;
use App\Services\CategoryAssetService;
use Illuminate\Http\Request;

class CategoryAssetController extends Controller
{
    protected $categoryAssetService;

    public function __construct(CategoryAssetService $categoryAssetService)
    {
        $this->categoryAssetService = $categoryAssetService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->authorize('viewAny',CategoryAsset::class);
        $data = $request->all();
        return $this->categoryAssetService->search($data);
    }
    public function datatables()
    {
        $this->authorize('viewAny',CategoryAsset::class);
        return $this->categoryAssetService->datatables();
    }
    public function index()
    {
        $this->authorize('viewAny',CategoryAsset::class);
        return view('admin.category_assets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',CategoryAsset::class);
        $category_asset = new CategoryAsset();
        $category_asset->status = 1;
        return view('admin.category_assets.store', compact('category_asset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryAssetRequest $request)
    {
        $this->authorize('create',CategoryAsset::class);
        $data = $request->all();
        try {
            $this->categoryAssetService->storeCategoryAsset($data);
            toastr('Thêm danh mục tài sản thành công', 'success', 'Thành công');
            return redirect(route('staff.asset.category-assets.index'));
        } catch (\Throwable $th) {
            toastr('Thêm danh mục tài sản thất bại', 'error', 'Thất bại');
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
        $this->authorize('view',CategoryAsset::findOrFail($id));
        $category_asset =  $this->categoryAssetService->findCategoryAsset($id);
        return view('admin.category_assets.edit', compact('category_asset'));
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
        $this->authorize('update',CategoryAsset::findOrFail($id));
        $data = $request->all();
        try {
            $this->categoryAssetService->updateCategoryAsset($data, $id);
            toastr('Cập nhật danh mục tài sản thành công', 'success', 'Thành công');
            return redirect(route('staff.asset.category-assets.index'));
        } catch (\Throwable $th) {
            toastr('Cập nhật danh mục tài sản thất bại', 'error', 'Thất bại');
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
        $this->authorize('delete',CategoryAsset::findOrFail($id));
        try {
            $this->categoryAssetService->deleteCategoryAsset($id);
            toastr('Ngừng hoạt động danh mục tài sản thành công', 'success', 'Thành công');
        } catch (\Throwable $th) {
            toastr('Ngừng hoạt động danh mục tài sản thất bại', 'error', 'Thất bại');
        } finally {
            return redirect()->back();
        }
    }
}
