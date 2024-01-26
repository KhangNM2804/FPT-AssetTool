<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;
use App\Services\AssetService;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    protected $assetService;
    public function __construct(AssetService $assetService)
    {
        $this->assetService = $assetService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        return $this->assetService->datatablesService();
    }
    public function index()
    {
        return view('admin.asset.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset = new Asset();
        return view('admin.asset.store', compact('asset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetRequest $request)
    {
        try {
            $data = $request->all();
            $this->assetService->createAssetService($data);
            toastr('Thêm tài sản thành công', 'success', 'Thành công');
            return redirect(route('staff.asset.asset.index'));
        } catch (\Throwable $th) {
            toastr('Thêm tài sản thất bại', 'error', 'Thất bại');
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
        $asset = $this->assetService->showAssetService($id);
    
        return view('admin.asset.show',compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = $this->assetService->findAssetService($id);
        return view('admin.asset.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssetRequest $request, $id)
    {
        try {
        $data = $request->all();
        $this->assetService->updateAssetService($data, $id);
        toastr('Cập nhật tài sản thành công', 'success', 'Thành công');
        return redirect(route('staff.asset.asset.index'));
        } catch (\Throwable $th) {
            toastr('Cập nhật tài sản thất bại', 'error', 'Thất bại');
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
            $this->assetService->deleteAsset($id);
            toastr('Xóa thành công','success','Thành công');
        } catch (\Throwable $th) {
           toastr('Xóa thất bại','error','Thất bại');
           return redirect()->back();
        }
        
    }
    public function buy($id){
        
    }
}
