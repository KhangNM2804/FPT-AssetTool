@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tạo danh mục tài sản</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('category-asset') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div >
            <form action="{{ route('staff.asset.category-assets.store') }}" method="post">
                @include('admin.category_assets._form', [
                    'category_asset' => $category_asset,
                    'buttonText' => 'Thêm danh mục',
                ])
            </form>
        </div>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
