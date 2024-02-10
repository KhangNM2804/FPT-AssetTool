@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-end">
        <a class="btn btn-success mr-2" href="{{ route('staff.export.form') }}">Tải file mẫu</a>
        <a class="btn btn-primary" href="{{ route('staff.asset.asset.create') }}">Thêm tài sản</a>
    </div>

    <div class="file-upload row">
        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
      
        <div class="image-upload-wrap">
          <input id="excelFile" class="file-upload-input" type='file'  accept=".xlsx, .xls" />
          <div class="drag-text">
            <h3>Drag and drop a file or select add Image</h3>
          </div>
        </div>
        <div class="file-upload-content">
          <div class="image-title-wrap">
            <button type="button"  class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
          </div>
        </div>
      </div>

    <table id="asset" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>Nhóm tài sản</th>
                <th>Danh mục tài sản</th>
                <th>Mẫu số</th>
                <th>Ký hiệu</th>
                <th>Số hóa đơn</th>
                <th>Mã tài sản</th>
                <th>Tên tài sản</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Đơn vị tính</th>
                <th>Số chứng từ</th>
                <th>Ngày sử dụng</th>
                <th>Matial-code</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
    </table>
@endsection
@include('admin.asset._importscript')
