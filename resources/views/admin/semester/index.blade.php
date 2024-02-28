@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end">
        <div class="form-group">
            <a href="{{route('staff.semester.semesters.create')}}" class="btn btn-primary">Thêm kỳ</a>
        </div>
    </div>
    <table id="semester" class="display" style="width: 100%">
        <thead>
            <tr>
                <td>Tên học kỳ</td>
                <td>Ngày bắt đầu</td>
                <td>Ngày kết thúc</td>
                <td>Hành động</td>
            </tr>
        </thead>
        
    </table>
@endsection
@include('admin.semester._indexscript')
