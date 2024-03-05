@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tạo học kỳ mới</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('semester') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div>
            <form action="{{ route('staff.semester.semesters.store') }}" method="post">
                @include('admin.semester._form', ['semester' => $semester, 'buttonText' => 'Thêm kỳ'])
            </form>
        </div>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
