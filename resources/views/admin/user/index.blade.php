@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('users') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <table id="user" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Tên người dùng</th>
                    <th>Quyền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
    
        </table>
    </div><!-- /.container-fluid -->
  
  </div>
    
@endsection
@include('admin.user._indexscript')