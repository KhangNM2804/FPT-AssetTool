@extends('layouts.admin')
@section('content')

    <table id="asset" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên tài sản</th>
                <th>Số lượng</th>
                <th>Vị trí đặt</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>

    </table>
@endsection
@include('admin.borrowed-asset._indexscript')
