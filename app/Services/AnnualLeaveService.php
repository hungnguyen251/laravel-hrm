<?php

namespace App\Services;

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
        return $this->leave->store($attrs);
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