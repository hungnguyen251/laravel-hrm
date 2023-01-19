<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class OrganizationService
{
    public function getAll()
    {
        $organization = Department::select('departments.name', DB::raw('COUNT(staffs.department_id) as staffs'))
                        ->leftJoin('staffs', 'staffs.department_id', '=', 'departments.id')
                        ->groupBy('departments.name')
                        ->where('staffs.status','active')
                        ->where('staffs.deleted_at',null)
                        ->paginate(Config::get('app.limit_results_returned'));

        $leaderPositionId = Staff::select('departments.name as department_name', 'staffs.last_name', 'staffs.first_name')
                            ->leftJoin('positions', 'staffs.position_id', '=', 'positions.id')
                            ->leftJoin('departments', 'staffs.department_id', '=', 'departments.id')
                            ->where('positions.name','Trưởng phòng')
                            ->where('staffs.status','active')
                            ->where('staffs.deleted_at',null)
                            ->get();

        foreach($leaderPositionId as $leader) {
            foreach($organization as $item) {
                if ($leader->department_name == $item->name) {
                    $item->leaderName = $leader->last_name . ' ' . $leader->first_name;
                }
            }
        }
        return $organization;
    }
}