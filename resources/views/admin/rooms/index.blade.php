@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end">
        <div class="form-group">
            <a class="btn btn-primary" href="{{ route('staff.rooms.create') }}">Thêm phòng</a>
        </div>
    </div>
    <table id="rooms" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Danh mục phòng</th>
                <th>Tên phòng</th>
                <th>Người quản lý</th>
                <th>Thứ tự hiển thị</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Danh mục phòng</th>
                <th>Tên phòng</th>
                <th>Người quản lý</th>
                <th>Thứ tự hiển thị</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </tfoot>
    </table>
@endsection
@include('admin.rooms._indexscript')
