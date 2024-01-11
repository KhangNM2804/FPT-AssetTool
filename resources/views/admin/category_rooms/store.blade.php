@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="justify-content-center"></div>
        <form action="{{ route('staff.locate.categoryrooms.store') }}" method="post">
            @include('admin.category_rooms._form', [
                'category_rooms' => $category_rooms,
                'buttonText' => 'Thêm mới',
            ])
        </form>
    </div>
@endsection
