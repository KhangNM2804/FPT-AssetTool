@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{ route('staff.semester.semesters.update', ['semester' => $semester]) }}" method="post">
            @method('PUT')
            @include('admin.semester._form', ['semester' => $semester, 'buttonText' => 'Cập nhật'])
        </form>
    </div>
@endsection
