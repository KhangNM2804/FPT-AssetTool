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
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class InvoicesRepository
{
    protected $invoice;
    protected $gate;

    public function __construct(Invoice $invoice, GateContract $gate)
    {
        $this->invoice = $invoice;
        $this->gate = $gate;
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

                if ($this->gate->allows('delete', $invoice)) {
                    return route('staff.asset.invoices.destroy', ['invoice' => $invoice]);
                } else {
                    return null;
                }
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
