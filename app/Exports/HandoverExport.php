<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

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
            },
        ];
    }
}
