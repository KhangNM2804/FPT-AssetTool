@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách học kỳ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('semester') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="d-flex justify-content-end">
            <div class="form-group">
                @can('create',App\Models\Semester::class)
                <a href="{{route('staff.semester.semesters.create')}}" class="btn btn-primary">Thêm kỳ</a>
                @endcan
            </div>
        </div>
        <table id="semester" class="display" style="width: 100%">
            <thead>
                <tr>
                    <td>Tên học kỳ</td>
                    <td>Ngày bắt đầu</td>
                    <td>Ngày kết thúc</td>
                    <td>Hành động</td>
                </tr>
            </thead>
            
        </table>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
@include('admin.semester._indexscript')
