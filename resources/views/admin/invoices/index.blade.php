@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách hóa đơn</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('asset') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="d-flex justify-content-end">
                <div class="form-group">
                    @can('create', App\Models\Asset::class)
                        <a href="{{ route('staff.asset.invoices.create') }}" class="btn btn-primary">Thêm hóa đơn</a>
                    @endcan
                </div>
            </div>
            <table id="invoice" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Số hóa đơn</th>
                        <th>Tạo lúc</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@include('admin.invoices._indexscript')
