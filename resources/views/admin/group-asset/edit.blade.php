@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{ route('staff.asset.group-assets.update', ['group_asset' => $group]) }}" method="post">
            @method('PUT')
            @include('admin.group-asset._form', ['group' => $group, 'buttonText' => 'Cập nhật'])
        </form>
    </div>
@endsection
