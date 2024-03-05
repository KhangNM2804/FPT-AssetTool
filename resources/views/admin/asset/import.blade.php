@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Import Tài sản</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('asset') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="d-flex justify-content-end">
                <a class="btn btn-success mr-2" href="{{ route('staff.export.form') }}">Tải file mẫu</a>
            </div>

            <div class="file-upload row">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add File
                    Excel</button>
                <div class="image-upload-wrap">
                    <input id="excelFile" class="file-upload-input" type='file' name="file" accept=".xlsx, .xls" />
                    <div class="drag-text">
                        <h3>Drag and drop a file or select add Image</h3>
                    </div>
                </div>
                <div class="file-upload-content mt-3">
                    <div class="image-title-wrap">
                        <button type="button" id="import" class="btn btn-primary">Nhập từ file <span
                                class="image-title">Uploaded File</span></button>
                        <button type="button" class="btn btn-danger" id="remove_file">Remove <span
                                class="image-title">Uploaded File</span></button>
                    </div>
                </div>
            </div>

            <table id="asset" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div><!-- /.container-fluid -->

    </div>
@endsection
@include('admin.asset._importscript')
