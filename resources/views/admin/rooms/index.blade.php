@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách phòng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('room') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="d-flex justify-content-end">
            <div class="form-group">
                @can('create',App\Models\Room::class)
                <a class="btn btn-primary" href="{{ route('staff.locate.rooms.create') }}">Thêm phòng</a>
                @endcan
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
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
@include('admin.rooms._indexscript')
