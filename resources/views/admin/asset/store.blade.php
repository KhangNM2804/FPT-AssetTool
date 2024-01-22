@extends('layouts.admin')
@section('content')
    <div class="container">
        <form id="myForm" action="{{route('staff.asset.asset.store')}}" method="post" enctype="multipart/form-data">
            @include('admin.asset._form',['asset'=>$asset,'buttonText'=>'Thêm'])
        </form>
    </div>
@endsection
@include('admin.asset._formscript')


