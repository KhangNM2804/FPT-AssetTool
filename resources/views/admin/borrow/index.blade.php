@extends('layouts.admin')
@section('content')
    <table id="borrow" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Người mượn</th>
                <th>Tài sản mượn</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Người mượn</th>
                <th>Tài sản mượn</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </tfoot>
    </table>
@endsection
@include('admin.borrow._indexscript')