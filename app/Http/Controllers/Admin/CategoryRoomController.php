<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRoomRequest;
use App\Models\CategoryRoom;
use App\Services\CategoryRoomService;
use Illuminate\Http\Request;

class CategoryRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $category_room_service;

    public function __construct(CategoryRoomService $category_room_service)
    {
        $this->category_room_service = $category_room_service;
    }
    public function index()
    {
        return view('admin.category_rooms.index');
    }

    public function datatables()
    {
        return $this->category_room_service->datatables();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_rooms = new CategoryRoom();
        $category_rooms->status = 1;
        return view('admin.category_rooms.store', compact('category_rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRoomRequest $request)
    {
        $data = $request->all();
        try {
            $this->category_room_service->createCategoryRoom($data);
            toastr('Thêm danh mục phòng thành công', 'success', 'Thành công');
        } catch (\Throwable $th) {
            toastr('Thêm danh mục phòng thất bại', 'error', 'Thất bại');
        }

        return redirect(route('staff.categoryrooms.index'));
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
        $category_rooms = $this->category_room_service->findCategoryRoom($id);
        return view('admin.category_rooms.edit', compact('category_rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRoomRequest $request, $id)
    {
        try {
            $data = $request->all();
            $this->category_room_service->updateCategoryRoom($data, $id);
            toastr('Cập nhật danh mục phòng thành công', 'success', 'Thành công');
            return redirect(route('staff.categoryrooms.index'));
        } catch (\Throwable $th) {
            toastr('Cập nhật danh mục phòng thất bại', 'error', 'Thất bại');
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
            $this->category_room_service->deleteCategoryCategoryRoom($id);
            toastr('Danh mục phòng đã ngừng hoạt động', 'success', 'Thành công');
            return redirect(route('staff.categoryrooms.index'));
        } catch (\Throwable $th) {
            toastr('Có lỗi xảy ra', 'error', 'Thất bại');
            return redirect(route('staff.categoryrooms.index'));
        }
    }
}
