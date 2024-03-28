@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách tài sản</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('asset') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="select-category">Danh mục tài sản</label>
                    <select id="select-category" name="category_asset_id"
                        class="form-control select2 {{ $errors->has('category_asset_id') ? 'is-invalid' : '' }}"
                        style="width: 100%;">
                        <option value="" selected>
                            Tất cả
                        </option>
                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label for="select-group">Loại tài sản</label>
                    <select id="select-group" class="form-control" name="group_assets_id">
                        <option value="" selected>
                            Tất cả</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                @can('create', App\Models\Asset::class)
                    <a class="btn btn-info mr-2" href="{{ route('staff.export.asset') }}">Xuất file</a>
                    <a class="btn btn-success mr-2" href="{{ route('staff.asset.asset.import') }}">Nhập từ file</a>
                    <a class="btn btn-primary" href="{{ route('staff.asset.asset.create') }}">Thêm tài sản</a>
                @endcan
            </div>
            <table id="asset" class="display nowrap" style="width:80%">
                <thead>
                    <tr>
                        <th>Hình</th>
                        <th>Mã tài sản</th>
                        <th>Tên tài sản</th>
                        <th>Số chứng từ</th>
                        <th>Số hóa đơn</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Vị trí</th>
                        <th>Tạo lúc</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
@endsection
@include('admin.asset._indexscript')
