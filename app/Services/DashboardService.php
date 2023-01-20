<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    /**
     * Count staff list
     *
     */
    public function countStaff()
    {
        $data = Staff::where('status', 'active')->count();

        return $data;
    }

    /**
     * Get notification list in month
     *
     */
    public function getNotificationInMonth()
    {
        $data = Notification::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->where('status', '!=', 'refuse')
                ->orderBy('created_at', 'DESC')
                ->get();
        
        $data->groupBy(function($item) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y-m-d');
        });

        return $data;

    }

    /**
     * Get new staff last 3 month recent
     *
     */
    public function getNewStaff()
    {
        $data = Staff::whereBetween('created_at', [
            Carbon::now()->locale('en')->subMonth(3),
            Carbon::now()->locale('en')])
            ->where('status', 'active')
            ->get();

        return $data;
    }
}