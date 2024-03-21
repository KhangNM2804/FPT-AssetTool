<!DOCTYPE html>
<html>

<head>
    <title>Mail nhắc nhở trả tài sản đúng hẹn</title>
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
    <p>Hiện tại các tài sản bạn mượn đã quá hạn trả. Các tài sản bao gồm: </p>
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
    <span>Vui lòng hoàn trả tài sản cho phòng Hành Chính vào thời điểm sớm nhất.</span> <br>
    <span>Trân trọng ./.</span>
</body>

</html>
