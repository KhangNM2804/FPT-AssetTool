@extends('layouts.admin')
@section('content')
    <form action="{{ route('staff.locate.rooms.update',['room'=>$room]) }}" method="post">
        @method('PUT')
        @include('admin.rooms._form', ['room' => $room, 'buttonText' => 'Cập nhật'])
    </form>
@endsection
@include('admin.rooms._formscript')
