@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-end">
    <a class="btn btn-primary" href="{{route('staff.asset.category-assets.create')}}">Thêm danh mục</a>
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
@endsection
@include('admin.category_assets._indexscript')
