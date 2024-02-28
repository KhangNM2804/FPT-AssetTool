<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Models\Semester;
use App\Services\SemesterService;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    protected $semesterService;
    public function __construct(SemesterService $semesterService)
    {
        $this->semesterService = $semesterService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        return $this->semesterService->datatables();
    }
    public function search(Request $request)
    {
        $data = $request->all();
        return $this->semesterService->searchSemester($data);
    }
    public function index()
    {
        return view('admin.semester.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = new Semester();
        return view('admin.semester.store', compact('semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemesterRequest $request)
    {
        try {
            $data = $request->all();
            $this->semesterService->storeSemesterService($data);
            toastr('Thêm kỳ thành công', 'success', 'Thành công');

            return redirect(route('staff.semester.semesters.index'));
        } catch (\Throwable $th) {

            toastr('Thêm kỳ thất bại lỗi' + $th->getMessage(), 'error', 'Thất bại');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semester =  $this->semesterService->findSemesterService($id);
        return view('admin.semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSemesterRequest $request, $id)
    {
        try {
            $data = $request->all();
            $this->semesterService->updateSemesterService($data, $id);
            toastr('Cập nhật kỳ thành công', 'success', 'Thành công');
            return redirect(route('staff.semester.semesters.index'));
        } catch (\Throwable $th) {
            toastr('Cập nhật kỳ thất bại lỗi' + $th->getMessage(), 'error', 'Thất bại');
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
            $this->semesterService->deleteSemesterService($id);
            toastr('Xóa kỳ thành công', 'success', 'Thành công');
            return redirect(route('staff.semester.semesters.index'));
        } catch (\Throwable $th) {
            toastr('Xóa kỳ thất bại lỗi' + $th->getMessage(), 'error', 'Thất bại');
            return redirect()->back();
        }
    }
}
