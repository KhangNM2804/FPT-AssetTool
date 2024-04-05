<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BorrowService;
use App\Services\HandoverService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $borrowService;
    protected $handoverService;

    public function __construct(BorrowService $borrowService, HandoverService $handoverService)
    {
        $this->borrowService = $borrowService;
        $this->handoverService = $handoverService;
    }

    public function count()
    {
        $countPending =  $this->borrowService->countBorrowPenddingService();
        $countHandover = $this->handoverService->countHandover();
        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => [
                'countPending' => $countPending,
                'countHandover' => $countHandover
            ]
        ]);
    }
    
}
