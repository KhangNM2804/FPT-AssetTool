<?php

namespace App\Services;

use App\Repositories\DashboardRepository;

class DashboardService
{
    protected $dashboardRepository;
    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }
    public function expenseAllDashboardService()
    {
        return $this->dashboardRepository->expenseAllDashboard();
    }
    public function expenseHaveFilterDashboardService($data)
    {
        return $this->dashboardRepository->expenseHaveFilterDashboard($data);
    }
}
