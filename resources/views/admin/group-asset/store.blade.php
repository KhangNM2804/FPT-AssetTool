@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tạo nhóm tài sản</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('group-asset') }}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div >
            <form action="{{ route('staff.asset.group-assets.store') }}" method="post">
                @include('admin.group-asset._form', ['group' => $group, 'buttonText' => 'Thêm nhóm'])
            </form>
        </div>
    </div><!-- /.container-fluid -->

</div>
    
@endsection
