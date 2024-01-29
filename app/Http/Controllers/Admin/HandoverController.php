<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveHandoverRequest;
use App\Models\Handover;
use App\Services\HandoverService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $handoverService;
    public function __construct(HandoverService $handoverService)
    {
        $this->handoverService = $handoverService;
    }
    public function index()
    {
        $handovers = Handover::with(['assetDetail.asset', 'assetDetail.room'])->where('user_id', Auth::user()->id)->get();


        return view('admin.handover.index', compact('handovers'));
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
        try {
            $data = $request->all();
            $this->handoverService->createHandover($data);
            toastr('Thêm vào biên bản bàn giao thành công', 'success', 'Thành công');
        } catch (\Throwable $th) {
            toastr('Thêm vào biên bản bàn giao thất bại', 'error', 'Thất bại');
        }

        return redirect()->back();
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
    public function destroy($id)
    {

        $this->handoverService->deleteHandover($id);
        toastr('Xóa khỏi biên bản bàn giao thành công', 'success', 'Thành công');
        return redirect()->back();
    }
    public function save(SaveHandoverRequest $request)
    {
        $data = $request->all();
        $this->handoverService->saveHandover($data);
        toastr('Chuyển vị trí thành công', 'success', 'Thành công');
        return redirect()->back();
    }
    public function export()
    {
        return view('export.handoverExport');
    }
}
