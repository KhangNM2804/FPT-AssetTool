<?php

namespace App\Services;

use App\Models\Asset;
use App\Repositories\AssetRepository;
use App\Repositories\InvoicesRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InvoicesService
{
    protected $invoicesRepository;

    public function __construct(InvoicesRepository $invoicesRepository)
    {
        $this->invoicesRepository = $invoicesRepository;
    }
    public function datatablesService()
    {
        return $this->invoicesRepository->datatables();
    }

    public function createInvoiceService($data)
    {

        $file = $data['file'];
        $extension = $file->getClientOriginalExtension();
        $hashedFilename =  $data['denominator'] . $data['symbol'] . $data['invoice_number'] . '.' . $extension;
        $file->move(storage_path('app/private/pdf'), $hashedFilename);
        $data['path'] = $hashedFilename;
        $data['user_id'] = Auth::user()->id;

        return $this->invoicesRepository->create($data);
    }
    public function deleteInvoiceService($id)
    {
        return $this->invoicesRepository->delete($id);
    }
}
