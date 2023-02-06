<?php

namespace App\Services;

use App\Models\Staff;
use App\Repositories\AnnualLeaveRepository;

class AnnualLeaveService
{
    protected $leave;

    public function __construct(AnnualLeaveRepository $leaveRepository)
    {
        $this->leave = $leaveRepository;
    }

    public function getAllLeave($attrs)
    {
        return $this->leave->getAll($attrs);
    }

    public function getLeaveById(int $id)
    {
        return $this->leave->getById($id);
    }

    public function createLeave(array $attrs)
    {
        if (!empty($attrs['staff_id']) && !empty($attrs['working_time'])) {
            $staffId = Staff::select('id')->where('code', $attrs['staff_id'])->get();

            if (empty($staffId) || count($staffId) == 0) {
                return false;

            } else {
                $attrs['staff_id'] = $staffId[0]->id;
                $date = str_replace('/', '-', $attrs['working_time']);
                $startDate = date('Y-m-d', strtotime($date));
                $workingTime = floor((strtotime(date('Y-m-d H:i:s')) - strtotime($startDate))/86400/30);
                $attrs['working_time'] = round((strtotime(date('Y-m-d H:i:s')) - strtotime($startDate))/86400);
                $attrs['number'] = doubleval($workingTime);
    
                return $this->leave->store($attrs);
            }

        } else {
            return false;
        }
    }

    public function updateLeaveById(int $id, array $attrs)
    {
        return $this->leave->updateById($id, $attrs);
    }


    public function deleteLeaveById(int $id)
    {
        return $this->leave->deleteById($id);
    }
}