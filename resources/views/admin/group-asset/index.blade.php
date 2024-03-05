@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách nhóm tài sản</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('group-asset') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="d-flex justify-content-end">
            <div class="form-group">
                @can('create', App\Models\GroupAsset::class)
                    <a href="{{ route('staff.asset.group-assets.create') }}" class="btn btn-primary">Thêm nhóm</a>
                @endcan
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
    </div><!-- /.container-fluid -->

</div>
    
@endsection
@include('admin.group-asset._indexscript')
