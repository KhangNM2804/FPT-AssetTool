@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="select-category">Danh mục tài sản:</label>
                    <span
                        class="badge badge-secondary">{{ $asset->category ? $asset->category->name : 'Chưa xác định' }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="select-group">Loại tài sản:</label>
                    <span class="badge badge-secondary">{{ $asset->group ? $asset->group->name : 'Chưa xác định' }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="invoice-number">Số hóa đơn:</label>
                    <span class="badge badge-secondary">{{ $asset->invoice }}</span>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="document_number">Số chứng từ:</label>
                    <span class="badge badge-secondary">{{ $asset->document_number }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="code">Mã tài sản:</label>
                    <span class="badge badge-secondary">{{ $asset->code }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="name">Tên tài sản:</label>
                    <span class="badge badge-secondary">{{ $asset->name }}</span>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="quantity">Số lượng:</label>
                    <span class="badge badge-secondary">{{ $asset->quantity }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="price">Đơn giá:</label>
                    <span class="badge badge-secondary">{{ number_format($asset->price, 0, ',', ',') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="date_of_use">Tổng tiền:</label>
                    <span class="badge badge-secondary">{{ number_format($asset->total_price, 0, ',', ',') }}</span>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_use">Ngày bắt đầu sử dụng:</label>
                    <span class="badge badge-secondary">{{ $asset->date_of_use }}</span>
                </div>
                <div class="form-group col-md-4 ">
                    <label for="material_code">Material-Code:</label>
                    <span class="badge badge-secondary">{{ $asset->material_code }}</span>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="note">Ghi chú:</label>
                    <p class="border border-secondary bg-secondary rounded-2 font-weight-bold"
                        style="word-wrap: break-word; display: inline-block;">
                        {{ $asset->note }}
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="row d-flex justify-content-center">
                    <img id="previewImage" class="img-thumbnail" style="display: block; width: 300px; height: 300px;"
                        alt="Preview Image" src="{{ $asset->image ? asset('storage/uploads/' . $asset->image) : '' }}">
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-success mb-3" id="addDetail">Thêm chi tiết tài sản</button>
    <button class="btn btn-primary mb-3" id="mergeDetail">Gộp chi tiết tài sản</button>

    <table id="asset" class="display" style="width: 100%">
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>#</th>
                <th>Tên tài sản</th>
                <th>Số lượng</th>
                <th>Vị trí đặt</th>
                <th>Người nhận bàn giao</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asset->assetDetail as $item)
                <tr>
                    <td><input type="checkbox" name="checkBox" class="selectCheckbox"></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->room ? $item->room->name : 'Chưa xác định' }}</td>
                    <td>{{ $item->reciver->name }}</td>
                    <td>{!! $item->status == 1
                        ? '<span class="badge badge-success">Đang sử dụng</span>'
                        : '<span class="badge badge-danger">Đã thanh lý</span>' !!}</td>
                    <td>
                        @if ($item->status == 1)
                            
                                <form style="display: inline" action="{{ route('staff.asset.handover.store') }}"
                                    method="post">
                                    <div class="d-none">
                                        <input type="hidden" name="asset_details_id" value="{{ $item->id }}" required>
                                    </div>
                                    <button {{in_array($item->id,$handovers)?'disabled':''}} class="btn btn-primary" title="Thêm vào biên bản bàn giao"><i
                                            class="fa fa-plus"></i></button>
                                </form>
                           


                            <form style="display: inline;" id="splitForm"
                                action="{{ route('staff.asset.asset-detail.split', ['detail' => $item]) }}" method="post">
                                <div class="d-none">
                                    <input type="hidden" id="quantity" name="quantity" required>
                                </div>
                                <button title="Tách tài sản" id="splitButton"
                                    onclick="handleSplitFormSubmit(this.form,event)" class="btn btn-secondary"><i
                                        class="fas fa-divide"></i></button>
                            </form>

                            <form class="d-sm-inline-block"
                                action="{{ route('staff.asset.asset-detail.buy', ['detail' => $item]) }}" method="post">
                                <button title="Thanh lý tài sản" class="btn btn-warning text-white"
                                    onclick="return confirm('Bạn có chắc chắn thanh lý tài sản này?')"><i
                                        class="fas fa-shopping-cart"></i></button>
                            </form>
                            <form style="display: inline;"
                                action="{{ route('staff.asset.asset-detail.destroy', ['asset_detail' => $item]) }}"
                                method="post">
                                @CSRF
                                @method('DELETE')
                                <button title="Xóa tài sản" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn ngừng hoạt động tài sản này?')"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        @else
                            <span class="badge badge-danger">Không được quyền</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Tên tài sản</th>
                <th>Số lượng</th>
                <th>Vị trí đặt</th>
                <th>Người nhận bàn giao</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </tfoot>
    </table>
@endsection
@include('admin.asset._showscript')