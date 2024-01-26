@extends('layouts.admin')
@section('content')
    <table id="handover" class="display" style="width: 100%">
        <thead>
            <tr>
                <td>Tên tài sản</td>
                <td>Số lượng</td>
                <td>Vị trí hiện tại</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($handovers as $item)
                <tr>
                    <td>{{ $item->assetDetail->asset->name }}</td>
                    <td>{{ $item->assetDetail->quantity }}</td>
                    <td>{{ $item->assetDetail->room ? $item->assetDetail->room->name : 'Chưa xác định' }}</td>
                    <td>
                        <form style="display: inline"
                            action="{{ route('staff.asset.handover.destroy', ['handover' => $item]) }}" method="post">
                            @CSRF
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <td>Tên tài sản</td>
                <td>Số lượng</td>
                <td>Vị trí hiện tại</td>
                <td>Hành động</td>
            </tr>
        </tfoot>
    </table>
@endsection
@include('admin.handover._indexscript')
