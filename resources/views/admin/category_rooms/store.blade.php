@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm danh mục phòng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('categoryrooms') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div>
        
            <form action="{{ route('staff.locate.categoryrooms.store') }}" method="post">
                @include('admin.category_rooms._form', [
                    'category_rooms' => $category_rooms,
                    'buttonText' => 'Thêm mới',
                ])
            </form>
        </div>
    </div><!-- /.container-fluid -->
  
  </div>
   
@endsection
