@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{ route('staff.semester.semesters.store') }}" method="post">
            @include('admin.semester._form', ['semester' => $semester, 'buttonText' => 'Thêm kỳ'])
        </form>
    </div>
@endsection
