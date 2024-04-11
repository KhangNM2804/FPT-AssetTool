@extends('layouts.client')
@section('content')
    <section class="h-100 h-custom">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-3"><span href="#!" class="text-body">DANH SÁCH TÀI SẢN</span></h5>
                            <hr>
                            <div class="row">

                                <div class="col-lg-7">

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-0">Danh sách hiện tại có {{ $categoryAsset->count() }} tài sản có
                                                thể mượn</p>
                                        </div>

                                    </div>

                                    <input class="form-control form-control-sm w-3" type="text" id="myInput"
                                        placeholder="Search...">
                                    <br>
                                    <div id="myList" style="height: 500px; overflow-y: auto;">
                                        @foreach ($categoryAsset as $item)
                                            <div id="item" class="card mb-3" style="min-height: 97px;">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="{{ $item->asset[0]->image ? asset('storage/uploads/' . $item->asset[0]->image) : '' }}"
                                                                    class="img-fluid rounded-3" alt="No image"
                                                                    style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5>{{ $item->name }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-2">{{ $item->sum_quantity }}</h5>
                                                            </div>
                                                            <button class="btn btn-primary text-white btn-add"
                                                                data-item-id="{{ $item->id }}"
                                                                data-item-name="{{ $item->name }}"
                                                                data-item-quantity="{{ $item->sum_quantity }}">

                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                                <div class="col-lg-5 mt-5">
                                    <div class="card bg-dark text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-center align-items-center mb-4">
                                                <h5 class="mb-0">PHIẾU ĐĂNG KÝ MƯỢN TÀI SẢN</h5>
                                            </div>
                                            <form id="borrow-form" method="post" class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeName">Ngày mượn</label>
                                                    <input type="datetime-local" id="typeName" name="start_at"
                                                        class="form-control form-control-lg" required />
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeText">Ngày trả</label>
                                                    <input type="datetime-local" id="typeText" name="end_at"
                                                        class="form-control form-control-lg" required />
                                                </div>
                                                <hr class="my-4">
                                                <div class="d-flex justify-content-between rounded-3">
                                                    <table id="item-table" class="table">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th scope="col">#</th>
                                                                <th scope="col">Tên tài sản</th>
                                                                <th scope="col">Số lượng</th>
                                                                <th scope="col">Hành động</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-secondary btn-block btn-lg">
                                                        <span>Đăng ký mượn</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        </form>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('client.borrow-assets._indexscript')
