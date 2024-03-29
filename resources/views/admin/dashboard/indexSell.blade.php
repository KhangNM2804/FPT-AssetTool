@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách tài sản đã thanh lý</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="d-flex justify-content-end">
        </div>
            <table id="asset_selled" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>Danh mục tài sản</th>
                        <th>Tên tài sản</th>
                        <th>Số lượng</th>
                        <th>Vị trí đặt</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                
            </table>
    </div><!-- /.container-fluid -->
  
  </div>

@endsection
@include('admin.dashboard._indexSell')
