@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới hóa đơn</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('asset') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <form action="{{ route('staff.asset.invoices.store') }}" method="post" enctype="multipart/form-data">
                @include('admin.invoices._form',['buttonText'=>'Thêm'])
            </form>
        </div>
    </div>
@endsection

