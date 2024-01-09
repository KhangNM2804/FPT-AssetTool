@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="justify-content-center"></div>
        <form action="{{ route('staff.categoryrooms.update',['categoryroom'=>$category_rooms]) }}" method="post">
            @method('PUT')
            @include('admin.category_rooms._form', [
                'category_rooms' => $category_rooms,
                'buttonText' => 'Cập nhật',
            ])
        </form>
    </div>
@endsection