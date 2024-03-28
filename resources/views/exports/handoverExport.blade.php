<div class="container">
    <table>
        <tbody>
            <tr style="text-align: center">
                <td style="text-align: center" colspan="4">TRƯỜNG CAO ĐẲNG FPT POLYTECHNIC</td>
                <td style="text-align: center" colspan="4"><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></td>
            </tr>
            <tr style="text-align: center">
                <td style="text-align: center" colspan="4"><b>TRUNG TÂM FPT POLYTECHNIC CẦN THƠ</b></td>
                <td style="text-align: center" colspan="4"><b>Độc lập - Tự do - Hạnh phúc</b></td>
            </tr>
            <tr style="text-align: center">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center" colspan="4"><b>---O0O---</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: center">
                <td style="text-align: center; font-size: 20px" colspan="8">
                    <span>BIÊN BẢN BÀN GIAO TÀI SẢN</span>
                </td>
            </tr>
            <tr>
                <td colspan="8"><b>1 - Bên bàn giao: </b></td>
            </tr>
            <tr>
                <td style="font-weight: bold" colspan="1"> <span style="font-size: 30"> Ông/Bà: </span></td>
                <td colspan="3"> <span>{{ $user->name }}</span></td>
                <td style="font-weight: bold" colspan="1"> <span style="font-size: 30"> Bộ phận: </span></td>
                <td colspan="3"> <span>Phòng hành chính</span></td>
            </tr>
            <tr>
                <td colspan="8"><b>2 - Bên nhận: </b></td>
            </tr>
            <tr>
                <td style="font-weight: bold" colspan="1"> <span style="font-size: 30"> Ông/Bà: </span></td>
                <td colspan="3"> <span>{{ $user->handovers[0]->assetDetail->reciver->name }}</span></td>
                <td style="font-weight: bold" colspan="1"> <span style="font-size: 30"> Bộ phận: </span></td>
                <td colspan="3"> <span>{{ $user->room }}</span></td>
            </tr>
            <tr>
                <td colspan="8"><b>3 - Nội dung bàn giao: </b></td>
            </tr>
            <tr>
                <td colspan="3"><input type="checkbox" name="cap" id="cap">&#9634;Cấp mới tài sản</td>
                <td colspan="3"><input type="checkbox" name="thu" id="thu">&#9634;Thu hồi tài sản</td>
                <td colspan="2"><input type="checkbox" name="luan" id="luan">&#9634;Luân chuyển tài sản</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center;">STT</td>
                <td style="border: 1px solid black; text-align: center;">Tên tài sản</td>
                <td style="border: 1px solid black; text-align: center;">ĐVT</td>
                <td style="border: 1px solid black; text-align: center;">Số lượng</td>
                <td style="border: 1px solid black; text-align: center;">Đơn giá</td>
                <td style="border: 1px solid black; text-align: center;">Thành tiền</td>
                <td style="border: 1px solid black; text-align: center;">Tình trạng tài sản</td>
                <td style="border: 1px solid black; text-align: center;">Hình ảnh</td>
            </tr>
            @foreach ($user->handovers as $item)
                <tr>
                    <td style="text-align: center; border: 1px solid black;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black;">{{ $item->assetDetail->asset->name }}</td>
                    <td style="text-align: center; border: 1px solid black;">{{ $item->assetDetail->asset->unit }}</td>
                    <td style="text-align: center; border: 1px solid black;">{{ $item->assetDetail->quantity }}</td>
                    <td style="text-align: center; border: 1px solid black;">{{ $item->assetDetail->asset->price }}</td>
                    <td style="text-align: center; border: 1px solid black;">
                        {{ $item->assetDetail->quantity * $item->assetDetail->asset->price }}
                    </td>
                    <td style="text-align: center; border: 1px solid black;">
                        {{ $item->assetDetail->status == 1 ? 'Mới' : '' }}</td>
                    <td style="text-align: center; border: 1px solid black;"></td>
                </tr>
            @endforeach



            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style=" margin-top: 10px">
                <td style="text-align: center;" colspan="4"> </td>
                <td style="text-align: center;" colspan="4"> <span> Cần Thơ, ngày ... tháng ... năm 20..</span></td>
            </tr>
            <tr>
                <td style="text-align: center" colspan="4">Người nhận</td>
                <td style="text-align: center" colspan="4">Người bàn giao</td>
            </tr>
        </tbody>
    </table>
</div>
