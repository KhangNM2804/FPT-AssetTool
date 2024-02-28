@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class=" row">
                <div class="form-group col-md-4">
                    <label for="name">Tên phòng:</label>
                    <span class="badge badge-secondary">{{ $room->name }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="select-category">Danh mục phòng:</label>
                    <span
                        class="badge badge-secondary">{{ $room->category_room ? $room->category_room->name : 'Chưa xác định' }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="select-group">Người quản lý:</label>
                    <span class="badge badge-secondary">{{$room['manager']->name}}</span>
                </div>
            </div>
        </div>
    </div>

    <table id="asset" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên tài sản</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
                <th>Người nhận</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($room->assetDetails as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->asset->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->asset->price, 0, '.', ',') }}</td>
                    <td>{{ number_format($item->quantity * $item->asset->price, 0, '.', ',') }}</td>
                    <td>{{ $item->reciver->name }}</td>
                    <td>{!! $item->status == 1
                        ? '<span class="badge badge-success">Đang sử dụng</span>'
                        : '<span class="badge badge-danger">Đã thanh lý</span>' !!}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
@include('admin.rooms._showscript')
