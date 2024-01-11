<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    protected $room_service;

    public function __construct(RoomService $room_service)
    {
        $this->room_service = $room_service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rooms.index');
    }
    public function getAllRoom()
    {
        return $this->room_service->getAllRoomsService();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = new Room();
        return view('admin.rooms.store', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {

        $data = $request->all();
        $data['created_by'] = Auth::user()->id;
        try {
            $this->room_service->storeRoomService($data);
            toastr('Thêm phòng thành công', 'success', 'Thành công');
            return redirect(route('staff.rooms.index'));
        } catch (\Throwable $th) {
            toastr('Thêm thất bại', 'error', 'Thất bại');
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
        $room = $this->room_service->findRoomService($id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoomRequest $request, $id)
    {

        try {
            $data = $request->all();
            $this->room_service->updateRoomService($data, $id);
            toastr('Cập nhật thành công', 'success', 'Thành công');
            return redirect(route('staff.rooms.index'));
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
            $this->room_service->deleteRoomService($id);
            toastr('Xóa phòng thành công','success','Thành công');
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr('Xóa thất bại','error','Thất bại');
            return redirect()->back();
        }
    }
}
