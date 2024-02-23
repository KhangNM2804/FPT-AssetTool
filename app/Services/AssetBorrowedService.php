<?php

namespace App\Services;

use App\Models\Setting;
use App\Repositories\AssetBorrowedRepository;
use App\Repositories\SettingRepository;

class AssetBorrowedService
{
    protected $settingRepository;
    protected $assetBorrowedRepository;
    public function __construct(SettingRepository $settingRepository, AssetBorrowedRepository $assetBorrowedRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->assetBorrowedRepository = $assetBorrowedRepository;
    }
    public function datatables()
    {
        return $this->assetBorrowedRepository->datatables();
    }
    public function storeAssetBorrowedService($idAssetDetail)
    {
        $setting = Setting::where('key', 'assets_borrowed')->first();
        if ($setting->value == null) {
            $value = [];
        } else {
            $value = json_decode($setting->value, true);
        }


        if (is_array($value)) {
            if (in_array($idAssetDetail, $value)) {
                toastr('Tài sản này đã nằm trong danh sách mượn', 'error');
                return;
            }
            array_push($value, $idAssetDetail);
            $this->settingRepository->update('assets_borrowed', $value);
            toastr('Thêm tài sản vào danh sách được mượn thành công', 'success');
            return;
        }
    }
    public function deleteAssetBorrowedService($id)
    {
        $setting = Setting::where('key', 'assets_borrowed')->first();
        if ($setting->value == null) {
            toastr('Không có id này không danh sách tài sản cho mượn', 'error');
            return;
        } else {
            $value = json_decode($setting->value, true);
            $key = array_search($id, $value);

            array_splice($value, $key, 1); // Xóa phần tử có giá trị là 5 khỏi mảng
            $this->settingRepository->update('assets_borrowed', $value);
            toastr('Xóa thành công tài sản khỏi danh sách cho mượn', 'success');
            return;
        }
    }
}
