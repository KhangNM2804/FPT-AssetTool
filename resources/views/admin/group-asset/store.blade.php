@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{ route('staff.asset.group-assets.store') }}" method="post">
            @include('admin.group-asset._form', ['group' => $group, 'buttonText' => 'Thêm nhóm'])
        </form>
    </div>
@endsection
