@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{ route('staff.asset.category-assets.store') }}" method="post">
            @include('admin.category_assets._form', [
                'category_asset' => $category_asset,
                'buttonText' => 'Thêm danh mục',
            ])
        </form>
    </div>
@endsection
