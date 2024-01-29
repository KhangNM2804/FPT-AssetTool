@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">TRƯỜNG CAO ĐẲNG FPT POLYTECHNIC</div>
            <div class="col-md-6 text-center font-weight-bold">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
        </div>
        <div class="row">
            <div class="col-md-6  text-center font-weight-bold">TRUNG TÂM FPT POLYTECHNIC CẦN THƠ</div>
            <div class="col-md-6  text-center font-weight-bold">Độc lập - Tự do - Hạnh phúc</div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6  text-center">---O0O---</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">BIÊN BẢN BÀN GIAO TÀI SẢN</h2>





                <div class="row">
                    <div class="col-md-6">
                        <h4>1 - Bên bàn giao:</h4>

                        <p>Ông/Bà: Nguyễn Minh Khang</p>
                        <p>Bộ phận: Phòng Hành Chính</p>
                    </div>

                    <div class="col-md-6">
                        <h4>2 - Bên nhận:</h4>

                        <p>Ông/Bà: Cù Thị Minh Châu</p>
                        <p>Bộ phận: P.Hành Chính</p>
                    </div>
                </div>



                <h4>3 - Nội dung bàn giao:</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên tài sản</th>
                            <th>Đơn vị</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>Tình trạng</th>
                            <th>Hình ảnh</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>Tên tài sản</th>
                            <th>Cái</th>
                            <th>5</th>
                            <th>6000</th>
                            <th>30000</th>
                            <th>Mới</th>
                            <th>Hình ảnh</th>
                        </tr>

                        {{-- @foreach ($danhSachTaiSan as $taiSan)
                    <tr>
                        <td>{{ $taiSan->stt }}</td>
                        <td>{{ $taiSan->tenTaiSan }}</td>
                        <td>{{ $taiSan->donVi }}</td>
                        <td>{{ $taiSan->soLuong }}</td>
                        <td>{{ number_format($taiSan->donGia) }}</td>
                        <td>{{ number_format($taiSan->thanhTien) }}</td>
                        <td>{{ $taiSan->tinhTrang }}</td>
                        <td>
                            @if ($taiSan->hinhAnh)
                            <img src="{{ asset('storage/' . $taiSan->hinhAnh) }}" alt="{{ $taiSan->tenTaiSan }}" width="100">
                            @endif
                        </td>
                    </tr>
                    @endforeach --}}
                    </tbody>
                </table>

                <hr>
                <div class="d-flex justify-content-end">

                </div>
                <div class="row">
                    <div class="col-md-6 text-center">

                    </div>

                    <div class="col-md-6 text-center">

                        <p>...........,ngày 29 tháng 01 năm 2024</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <p><strong>Người bàn giao</strong></p>
                        <p style="height: 30px;"></p>
                        <p class="mt-5">(Ký tên)</p>
                    </div>

                    <div class="col-md-6 text-center">
                        <p><strong>Người nhận</strong></p>
                        <p style="height: 30px;"></p>
                        <p class="mt-5">(Ký tên)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
