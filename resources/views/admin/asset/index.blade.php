@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end">
        <a class="btn btn-success mr-2" href="{{route('staff.asset.asset.import')}}">Nhập từ file</a>
        <a class="btn btn-primary" href="{{ route('staff.asset.asset.create') }}">Thêm tài sản</a>
    </div>
    <table id="asset" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>Hình</th>
                <th>Mã tài sản</th>
                <th>Tên tài sản</th>
                <th>Số hóa đơn</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Hình</th>
                <th>Mã tài sản</th>
                <th>Tên tài sản</th>
                <th>Số hóa đơn</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </tfoot>
    </table>
@endsection
@include('admin.asset._indexscript')
