@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end">
        <div class="form-group">
            <a href="{{route('staff.asset.group-assets.create')}}" class="btn btn-primary">Thêm nhóm</a>
        </div>
    </div>
    <table id="group-asset" class="display" style="width: 100%">
        <thead>
            <tr>
                <td>Tên Nhóm Tài Sản</td>
                <td>Ngày Tạo</td>
                <td>Trạng Thái</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td>Tên Nhóm Tài Sản</td>
                <td>Ngày Tạo</td>
                <td>Trạng Thái</td>
                <td>Hành động</td>
            </tr>
        </tfoot>
    </table>
@endsection
@include('admin.group-asset._indexscript')
