<?php

namespace App\Services;

use App\Models\AnnualLeave;
use App\Models\Department;
use App\Models\Diploma;
use App\Models\Position;
use App\Models\Salary;
use App\Models\Staff;
use App\Repositories\StaffRepository;

class StaffService
{
    protected $staffs;

    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffs = $staffRepository;
    }

    public function getAllStaff($attrs)
    {
        return $this->staffs->getAll($attrs);
    }

    public function getStaffById(int $id)
    {
        return $this->staffs->getById($id);
    }

    public function createStaff(array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        if ($this->staffs->store($data)) {
            $staffInfo = Staff::select('id')->where('code', strval($data['code']))->first();
            $staffId = $staffInfo->id;
        
            $this->storeStaffLeave($staffId);
            $this->storeStaffSalary($staffId, $attrs['amount']);

            return true;
        }

        return false;
    }

    public function updateStaffById(int $id, array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->staffs->updateById($id, $data);
    }


    public function deleteStaffById(int $id)
    {
        return $this->staffs->deleteById($id);
    }

    public function storageImage($image)
    {
        return $image->move('images/avatar', $image->getClientOriginalName());
    }

    public function handleFieldInput(array $attrs)
    {
        if (isset($attrs['_token'])) {
            unset($attrs['_token']);
        }

        if (isset($attrs['_method'])) {
            unset($attrs['_method']);
        }

        if (isset($attrs['date_of_birth'])) {
            $dOB = str_replace('/', '-', $attrs['date_of_birth']);
            $attrs['date_of_birth'] = date('Y-m-d', strtotime($dOB));
        }

        if (isset($attrs['position_id'])) {
            $positionId = Position::select('id')->where('name', $attrs['position_id'])->first();
            $attrs['position_id'] = $positionId->id;
        }

        if (isset($attrs['department_id'])) {
            $departmentId = Department::select('id')->where('name', $attrs['department_id'])->first();
            $attrs['department_id'] = $departmentId->id;
        }

        if (isset($attrs['diploma_id'])) {
            $diplomaId = Diploma::select('id')->where('name', $attrs['diploma_id'])->first();
            $attrs['diploma_id'] = $diplomaId->id;
        }

        if (isset($attrs['status']) && 'on' == $attrs['status']) {
            $attrs['status'] = 'active';
        } else {
            $attrs['status'] = 'inactive';
        }


        if (isset($attrs['start_date'])) {
            $startDate = str_replace('/', '-', $attrs['start_date']);
            $attrs['start_date'] = date('Y-m-d', strtotime($startDate));
        }

        if (!isset($attrs['code'])) {
            $attrs['code'] = 'GV' . rand(1000,9999);
        }

        //Lưu file ảnh
        if (isset($attrs['avatar'])) {
            $this->storageImage($attrs['avatar']);
            $attrs['avatar'] = $attrs['avatar']->getClientOriginalName();
        }

        if (isset($attrs['amount'])) {
            unset($attrs['amount']);
        }

        return $attrs;
    }

    public function getDepartmentInfo()
    {
        $departmentNames = Department::select('name')->get();

        return $departmentNames;
    }

    public function getDiplomaInfo()
    {
        $diplomaNames = Diploma::select('name')->get();

        return $diplomaNames;
    }

    public function getPositionInfo()
    {
        $positiontNames = Position::select('name')->get();

        return $positiontNames;
    }

    public function getInfoClassification()
    {
        $infoClassification = [
            'departments' => $this->getDepartmentInfo(),
            'diplomas' => $this->getDiplomaInfo(),
            'positions' => $this->getPositionInfo()
        ];

        return $infoClassification;
    }

    public function storeStaffSalary($staffId, $amount)
    {
        $attrs = [
            'staff_id' => $staffId,
            'amount' => $amount
        ];

        return Salary::create($attrs);
    }

    public function storeStaffLeave($staffId)
    {
        $attrs = [
            'staff_id' => $staffId,
            'number' => 0,
            'working_time' => 0
        ];

        return AnnualLeave::create($attrs);
    }
}