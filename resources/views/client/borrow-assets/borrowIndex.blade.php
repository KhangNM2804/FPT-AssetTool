@extends('layouts.client')
@section('content')
    <section class="h-100 h-custom">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-3"><span href="#!" class="text-body">DANH SÁCH PHIẾU MƯỢN</span></h5>
                            <hr>
                            <div class="row ">
                                <table id="borrow" class="table display nowrap" style="width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Ngày mượn</th>
                                            <th>Ngày trả</th>
                                            <th>Tài sản mượn</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrows as $item)
                                            <tr>
                                                <td>{{ $item->start_at }}</td>
                                                <td>{{ $item->end_at }}</td>
                                                <td>
                                                    @foreach ($item->details as $detail)
                                                        <span>{{ $detail->category->name }} :{{ $detail->quantity }}</span>
                                                        <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-info">Đang chờ duyệt</span>
                                                    @elseif ($item->status == 2)
                                                        <span class="badge badge-success">Đang mượn</span>
                                                    @elseif ($item->status == 3)
                                                        <span class="badge badge-secondary">Đã trả</span>
                                                    @elseif ($item->status == 4)
                                                        <span class="badge badge-danger">Đã hủy</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <form
                                                            action="{{ route('client.borrow.borrows-client-cancel', ['id' => $item->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-warning" type="submit"
                                                                onclick="return confirm('Bạn có chắc chắn hủy phiếu mượn này?')">Hủy
                                                                phiếu</button>
                                                        </form>
                                                    @else
                                                        <span class="badge badge-secondary">Không thể thao tác</span>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('client.borrow-assets._borrowIndexscript')
