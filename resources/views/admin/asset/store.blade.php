@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm tài sản</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('asset') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div >
                <form id="myForm" action="{{ route('staff.asset.asset.store') }}" method="post"
                    enctype="multipart/form-data">
                    @include('admin.asset._form', ['asset' => $asset, 'buttonText' => 'Thêm'])
                </form>
            </div>
        </div><!-- /.container-fluid -->

    </div>
@endsection
@include('admin.asset._formscript')
