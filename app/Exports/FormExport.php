<?php

namespace App\Exports;

use App\Models\CategoryAsset;
use App\Models\GroupAsset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class FormExport implements WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'Tên nhóm tài sản',
            'Tên danh mục tài sản',
            'Mẫu số',
            'Ký hiệu',
            'Số hóa đơn',
            'Mã tài sản',
            'Tên tài sản',
            'Số lượng',
            'Đơn giá',
            'Đơn vị tính',
            'Số chứng từ',
            'Ngày bắt đầu sử dụng',
            'Matiral-code',
            'Ghi chú'
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $lastRow = $sheet->getHighestRow();
                $groupAssets = GroupAsset::all()->pluck('id', 'name')->toArray();
                $categoryAssets = CategoryAsset::all()->pluck('id', 'name')->toArray();
                $nameGroup = array_keys($groupAssets);
                $nameCategory = array_keys($categoryAssets);
                for ($row = 2; $row <= 101; $row++) {
                    $validationGroup = $sheet->getCell("A{$row}")->getDataValidation();
                    $validationCategory = $sheet->getCell("B{$row}")->getDataValidation();
                    $validationGroup->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST)
                        ->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION)
                        ->setAllowBlank(false)
                        ->setShowInputMessage(true)
                        ->setShowErrorMessage(true)
                        ->setShowDropDown(true)
                        ->setErrorTitle('Input error')
                        ->setError('Value is not in list.')
                        ->setPromptTitle('Pick from list')
                        ->setPrompt('Please pick a value from the drop-down list.')
                        ->setFormula1('"' . implode(',', $nameGroup) . '"');
                    $validationCategory->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST)
                        ->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION)
                        ->setAllowBlank(false)
                        ->setShowInputMessage(true)
                        ->setShowErrorMessage(true)
                        ->setShowDropDown(true)
                        ->setErrorTitle('Input error')
                        ->setError('Value is not in list.')
                        ->setPromptTitle('Pick from list')
                        ->setPrompt('Please pick a value from the drop-down list.')
                        ->setFormula1('"' . implode(',', $nameCategory) . '"');
                }
            },
        ];
    }
}
