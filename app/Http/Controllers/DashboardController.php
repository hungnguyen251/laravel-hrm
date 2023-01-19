<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $dashboard;

    /**
     * Controller constructor.
     *
     * @param  \App\  $dashboard
     */
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboard = $dashboardService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countStaff(): JsonResponse
    {
        $data = $this->dashboard->countStaff();

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotificationInMonth(): JsonResponse
    {
        $data = $this->dashboard->getNotificationInMonth();

        return response()->json($data);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNewStaff(): JsonResponse
    {
        $data = $this->dashboard->getNewStaff();

        return response()->json($data);
    }
}
