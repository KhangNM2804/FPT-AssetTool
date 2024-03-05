@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cập nhật học kỳ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('semester') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div>
            <form action="{{ route('staff.semester.semesters.update', ['semester' => $semester]) }}" method="post">
                @method('PUT')
                @include('admin.semester._form', ['semester' => $semester, 'buttonText' => 'Cập nhật'])
            </form>
        </div>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
