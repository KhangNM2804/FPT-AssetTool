@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tạo phòng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('room') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <form action="{{ route('staff.locate.rooms.store') }}" method="post">
                @include('admin.rooms._form', ['room' => $room, 'buttonText' => 'Thêm phòng'])
            </form>
        </div><!-- /.container-fluid -->

    </div>
@endsection
@include('admin.rooms._formscript')
