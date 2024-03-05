@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cập nhật danh mục phòng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('categoryrooms') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div >
            <div class="justify-content-center"></div>
            <form action="{{ route('staff.locate.categoryrooms.update',['categoryroom'=>$category_rooms]) }}" method="post">
                @method('PUT')
                @include('admin.category_rooms._form', [
                    'category_rooms' => $category_rooms,
                    'buttonText' => 'Cập nhật',
                ])
            </form>
        </div>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection