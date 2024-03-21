<!DOCTYPE html>
<html>

<head>
    <title>Mail xác nhận mượn tài sản thành công</title>
</head>
<style>
    table,
    td,
    th {
        border: 1px solid;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
</style>

<body>
    <span>Dear {{ $data['name'] }}!</span>
    <p>Đơn mượn tài sản của bạn đã được duyệt thành công. Các tài sản bao gồm: </p>
    <table>
        <tr>
            <td>Tên tài sản</td>
            <td>Số lượng</td>
        </tr>
        @foreach ($data['details'] as $item)
            <tr>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <span>Vui lòng đến nhận tài sản vào giờ hành chính.</span> <br>
    <span>Trân trọng ./.</span>
</body>

</html>
