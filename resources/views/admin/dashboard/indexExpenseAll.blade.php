@extends('layouts.admin')
@section('content')
    <div>
        <form action="{{ route('staff.dashboard.indexExpenseRoom') }}" method="get">
            <div class="row">
                <div class="form-group col-md-6">

                    <select id="select2-example" name="semester_id" class="form-control select2" style="width: 100%;">
                        <!-- Option mặc định (nếu cần) -->
                        <option value="{{ isset($expenses['semester']) ? $expenses['semester']->id : '' }}" selected>
                            {{ isset($expenses['semester']) ? $expenses['semester']->name : 'Tất cả' }} </option>
                    </select>
                </div>
                <div class="form-group col-1">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-filter"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        @foreach ($expenses['room'] as $item)
            <div class="col-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <span>{{ $item->name }}</span>

                        <p>{{ number_format($item->sum_expend, 0, '.', ',') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('staff.locate.rooms.show', ['room' => $item]) }}" class="small-box-footer">More info
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@include('admin.dashboard._indexExpenseAllscript')
