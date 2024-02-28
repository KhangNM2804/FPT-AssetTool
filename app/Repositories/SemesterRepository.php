<?php

namespace App\Repositories;

use App\Models\CategoryAsset;
use App\Models\CategoryRoom;

use App\Models\Semester;

use Yajra\DataTables\DataTables;

class SemesterRepository
{
    protected $semester;
    public function __construct(Semester $semester)
    {
        $this->semester = $semester;
    }

    public function datatables()
    {
        $semester = $this->semester->query();
        return DataTables::of($semester)
            ->addColumn('edit_url', function ($semester) {
                return route('staff.semester.semesters.edit', ['semester' => $semester]);
            })
            ->addColumn('delete_url', function ($semester) {
                return route('staff.semester.semesters.destroy', ['semester' => $semester]);
            })
            ->make(true);
    }
    public function search($data)
    {
        if (isset($data['term'])) {
            $semesters = $this->semester->where('name', 'like', '%' . $data['term'] . '%')->get(['id', 'name']);
            $semester = new Semester(['id' => '', 'name' => 'Tất cả']);
            $semesters->prepend($semester);
            return $semesters;
        }
        $semesters = $this->semester->limit(20)->get(['id', 'name']);
        $semester = new Semester(['id' => '', 'name' => 'Tất cả']);
        $semesters->prepend($semester);
        return $semesters;
    }

    public function create($data)
    {
        return $this->semester->create($data);
    }

    public function find($id)
    {
        return $this->semester->findOrFail($id);
    }
    public function update($data, $id)
    {
        $semester = $this->semester->findOrFail($id);
        return $semester->update($data);
    }

    public function delete($id)
    {
        $semester = $this->semester->findOrFail($id);
        return $semester->delete();
    }
}
