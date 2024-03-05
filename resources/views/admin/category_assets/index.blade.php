@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh mục tài sản</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('category-asset') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="d-flex justify-content-end">
            @can('create',App\Models\CategoryAsset::class)
            <a class="btn btn-primary" href="{{route('staff.asset.category-assets.create')}}">Thêm danh mục</a>
            @endcan
        </div>
            <table id="category_asset" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>Danh mục tài sản</th>
                        <th>Ngày tạo</th>
                        <th>Trạng Thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Danh mục tài sản</th>
                        <th>Ngày tạo</th>
                        <th>Trạng Thái</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
            </table>
    </div><!-- /.container-fluid -->
  
  </div>

@endsection
@include('admin.category_assets._indexscript')
