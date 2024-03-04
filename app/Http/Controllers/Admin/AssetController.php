<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FormExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Imports\AssetImport;
use App\Models\Asset;
use App\Models\User;
use App\Services\AssetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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

        $this->authorize('viewAny', Asset::class);

        return $this->assetService->datatablesService();
    }
    public function index()
    {

        $this->authorize('viewAny', Asset::class);
        return view('admin.asset.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Asset::class);
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
        $this->authorize('create', Asset::class);
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

        $this->authorize('view', Asset::findOrFail($id));
        $asset = $this->assetService->showAssetService($id);
        $user = User::findOrFail(Auth::user()->id);
        $handovers = $user->handovers()->pluck('asset_details_id')->toArray();

        return view('admin.asset.show', compact('asset', 'handovers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->authorize('update', Asset::findOrFail($id));
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
        $this->authorize('update', Asset::findOrFail($id));
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
        $this->authorize('delete', Asset::findOrFail($id));
        try {
            $this->assetService->deleteAsset($id);

            return redirect()->back();
        } catch (\Throwable $th) {
            toastr('Xóa thất bại', 'error', 'Thất bại');
            return redirect()->back();
        }
    }
    public function sell($id)
    {
    }

    public function exportForm()
    {
        return Excel::download(new FormExport, 'form.xlsx');
    }
    public function importIndex()
    {
        $this->authorize('create', Asset::class);
        return view('admin.asset.import');
    }
    public function import(Request $request)
    {
        $this->authorize('create', Asset::class);
        Excel::import(new AssetImport, $request->file('file'));
        return response()->json(
            [
                'data' => [],
                'status' => 200,
            ]
        );
    }
}
