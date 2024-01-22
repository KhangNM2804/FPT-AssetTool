@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{route('staff.asset.asset.update',['asset'=>$asset])}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.asset._form',['asset'=>$asset,'buttonText'=>'Cập nhật'])
        </form>
    </div>
@endsection
@include('admin.asset._formscript')