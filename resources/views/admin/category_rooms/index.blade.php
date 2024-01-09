@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end">
        <div class="form-group ">
            <a href="{{ route('staff.categoryrooms.create') }}" class="btn btn-primary">Thêm danh mục phòng</a>
        </div>
    </div>

    <table id="category_rooms" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tên danh mục</th>
                <th>Tạo lúc</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Tên danh mục</th>
                <th>Tạo lúc</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </tfoot>
    </table>
@endsection
@include('admin.category_rooms._indexscript')
