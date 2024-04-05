<?php

namespace App\Repositories;

use App\Models\Asset;
use App\Models\AssetDetail;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class InvoicesRepository
{
    protected $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
    public function datatables()
    {
        $invoices = $this->invoice->query();
        return DataTables::of($invoices)
            ->addColumn('number_invoice', function ($invoice) {
                return $invoice->denominator . $invoice->symbol . $invoice->invoice_number;
            })
            ->addColumn('created_at', function ($invoice) {
                return $invoice->created_at->format('d-m-Y');
            })
            ->addColumn('delete_url', function ($invoice) {
                return route('staff.asset.invoices.destroy', ['invoice' => $invoice]);
            })
            ->make(true);
    }
    public function create($data)
    {
        return $this->invoice->create($data);
    }
    public function delete($id)
    {
        $invoice = $this->invoice->findOrFail($id);
        $filePath = storage_path('app/public/pdf/' . $invoice->path);
        if (File::exists($filePath)) {
            File::delete($filePath);
            
        }
      
       return $invoice->delete();
    }
}
