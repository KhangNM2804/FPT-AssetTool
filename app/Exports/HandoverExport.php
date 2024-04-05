<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
class HandoverExport implements FromView, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $user;
   

    public function __construct(User $user) {
        $this->user = $user;
     
    }

    public function view(): View
    {
        return view('exports.handoverExport', [
            'user' => $this->user,
        ]);
    }
    public function registerEvents(): array
    {
       
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Thiết lập header và footer
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->sheet->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $event->sheet->getDelegate()->getPageSetup()->setFitToPage(true);
                $event->sheet->getDelegate()->getPageMargins()->setTop(0.5);
                $event->sheet->getDelegate()->getPageMargins()->setRight(0.5);
                $event->sheet->getDelegate()->getPageMargins()->setLeft(0.5);
                $event->sheet->getDelegate()->getPageMargins()->setBottom(0.5);
                $footer = "&L03.1-BM/HC/HDCV/FPT v1/0";
            
                // Thiết lập footer cho tệp Excel
                $event->sheet->getDelegate()->getHeaderFooter()->setOddFooter($footer);

                //thiết lập ảnh
                $user = $this->user;
                $row = 13; // Start row for inserting images
                foreach ($user->handovers as $item) {
                    $imagePath = public_path('storage/uploads/' . $item->assetDetail->asset->image); // Assuming your image field is 'image'
                    if (file_exists($imagePath)) {
                        $drawing = new Drawing();
                        $drawing->setName('Product Image');
                        $drawing->setDescription('Product Image');
                        $drawing->setPath($imagePath);
                        $drawing->setCoordinates('H' . $row);
                        $drawing->setWorksheet($event->sheet->getDelegate());
                        $drawing->setWidthAndHeight(30, 30); // Set width and height to 30px
                        $row++;
                    }
                }
            },
        ];
    }
}
