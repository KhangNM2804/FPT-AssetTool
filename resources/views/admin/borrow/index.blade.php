@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách đăng ký mượn tài sản</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('borrow') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <table id="borrow" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Ngày mượn</th>
                        <th>Ngày trả</th>
                        <th>Người mượn</th>
                        <th>Tài sản mượn</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Ngày mượn</th>
                        <th>Ngày trả</th>
                        <th>Người mượn</th>
                        <th>Tài sản mượn</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.container-fluid -->

    </div>
@endsection
@include('admin.borrow._indexscript')
