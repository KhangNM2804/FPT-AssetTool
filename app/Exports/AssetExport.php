<?php

namespace App\Exports;

use App\Models\Asset;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class AssetExport implements FromView
{
    protected $data;
    protected $assetService;

    public function __construct($data, $assetService)
    {
        $this->data = $data;
        $this->assetService = $assetService;
    }
    public function view(): View
    {
        return view('exports.asset', [
            'asset' => $this->assetService->export($this->data)
        ]);
    }
}
