@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{ route('staff.asset.category-assets.update', ['category_asset' => $category_asset]) }}" method="POST">
            @method('PUT')
            @include('admin.category_assets._form', [
                'category_asset' => $category_asset,
                'buttonText' => 'Cập nhật',
            ])
        </form>
    </div>
@endsection
