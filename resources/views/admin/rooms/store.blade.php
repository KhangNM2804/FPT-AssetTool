@extends('layouts.admin')
@section('content')
    <form action="{{ route('staff.rooms.store') }}" method="post">
        @include('admin.rooms._form',['room'=>$room,'buttonText'=>'Thêm phòng'])
    </form>
@endsection
@include('admin.rooms._formscript')
