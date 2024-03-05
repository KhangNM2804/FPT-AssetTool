@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cập nhật danh mục tài sản</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('category-asset') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div >
            <form action="{{ route('staff.asset.category-assets.update', ['category_asset' => $category_asset]) }}" method="POST">
                @method('PUT')
                @include('admin.category_assets._form', [
                    'category_asset' => $category_asset,
                    'buttonText' => 'Cập nhật',
                ])
            </form>
        </div>
    </div><!-- /.container-fluid -->
  
  </div>
   
@endsection
