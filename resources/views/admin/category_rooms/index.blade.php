@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh mục phòng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('categoryrooms') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="d-flex justify-content-end">
            <div class="form-group ">
                @can('create', App\Models\CategoryRoom::class)
                    <a href="{{ route('staff.locate.categoryrooms.create') }}" class="btn btn-primary">Thêm danh mục phòng</a>
                @endcan
            </div>
        </div>
    
        <table id="category_rooms" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Tạo lúc</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
    
            <tfoot>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Tạo lúc</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
@include('admin.category_rooms._indexscript')
