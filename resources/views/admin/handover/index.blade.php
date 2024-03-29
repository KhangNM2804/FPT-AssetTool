@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bàn giao tài sản</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('handover') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                @can('create', App\Models\Handover::class)
                    <div class="form-group col-md-12 d-flex justify-content-end"style="margin-top: 31px"><button
                            id="submit-button" class="btn btn-success">Bàn
                            giao</button></div>
                @endcan
            </div>


            <table id="handover" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th class="d-none">Tên tài sản</th>
                        <th>Tên tài sản</th>
                        <th>Số lượng</th>
                        <th>Vị trí hiện tại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($handovers as $item)
                        <tr>
                            <td><input type="checkbox" name="checkBox" class="selectCheckbox"></td>
                            <td class="d-none">{{ $item->id }}</td>
                            <td>{{ $item->assetDetail->asset->name }}</td>
                            <td>{{ $item->assetDetail->quantity }}</td>
                            <td>{{ $item->assetDetail->room ? $item->assetDetail->room->name : 'Chưa xác định' }}</td>
                            <td>
                                <form style="display: inline"
                                    action="{{ route('staff.asset.handover.destroy', ['handover' => $item]) }}"
                                    method="post">
                                    @csrf
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
        </div><!-- /.container-fluid -->

    </div>
@endsection
@include('admin.handover._indexscript')
