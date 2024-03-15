<table>
    <thead>
        <tr>
            <th>Danh mục tài sản</th>
            <th>Loại tài sản</th>
            <th>Mã tài sản</th>
            <th>Tên tài sản</th>
            <th>Số chứng từ</th>
            <th>Số hóa đơn</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Tổng tiền</th>
            <th>Ngày bắt đầu sử dụng</th>
            <th>Vị trí</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($asset as $item)
            <tr>
                <td >{{ $item->category->name }}</td>
                <td>{{ $item->group->name }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->document_number }}</td>
                <td>{{ $item->denominator }}{{ $item->symbol }}{{ $item->invoice_number }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->price * $item->quantity }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->date_of_use)->format('d/m/y') }}

                </td>
                <td style="width: 100%;">
                    @foreach ($item->assetDetail as $key => $detail)
                        {{ $detail->room ? $detail->room->name : 'Chưa xác định' }}: {{ $detail->quantity }}
                        @if (!$loop->last)
                            <br>
                        @endif
                    @endforeach

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
