@extends('layouts.admin')
@section('content')
    <form class="row" action="{{route('staff.asset.handover.save')}}" method="POST">
        @CSRF
        <div class="form-group col-md-6">
            <label for="select-rooms">Vị trí mới</label>
            <select id="select-rooms" name="room_id"
                class="form-control select2 {{ $errors->has('room_id') ? 'is-invalid' : '' }}" style="width: 100%;">
                <option value="" selected>
                    Select an option
                </option>
            </select>
            @if ($errors->has('room_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('room_id') }}</strong>
                </div>
            @endif

        </div>
        <div class="form-group col-md-6"style="margin-top: 31px"><button type="submit" class="btn btn-success">Lưu</button></div>
    </form>


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
