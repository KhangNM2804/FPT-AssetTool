@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cấp quyền người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('users') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div>
            <form action="{{ route('staff.users.users.update', ['user' => $user]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('admin.user._form', ['user' => $user, 'roles' => $roles, 'buttonText' => 'Lưu'])
            </form>
        </div>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
