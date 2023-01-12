<?php

namespace App\Services;

use App\Models\Salary;
use App\Models\Timesheets;
use Illuminate\Support\Facades\Config;
use App\Repositories\TimesheetsRepository;
use Carbon\Carbon;
use Exception;

class TimesheetsService
{
    protected $timesheets;

    public function __construct(TimesheetsRepository $timesheetsRepository)
    {
        $this->timesheets = $timesheetsRepository;
    }

    public function getAllTimesheets($attrs)
    {
        return $this->timesheets->getAll($attrs);
    }

    public function getTimesheetsById(int $id)
    {
        return $this->timesheets->getById($id);
    }

    public function createTimesheets(array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->timesheets->store($data);
    }

    public function updateTimesheetsById(int $id, array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->timesheets->updateById($id, $data);
    }


    public function deleteTimesheetsById(int $id)
    {
        return $this->timesheets->deleteById($id);
    }

    public function handleFieldInput(array $attrs)
    {
        if (isset($attrs['_token'])) {
            unset($attrs['_token']);
        }

        if (isset($attrs['_method'])) {
            unset($attrs['_method']);
        }

        return $attrs;
    }

    public function automaticSalaryCalculation($data)
    {
        if ($this->deleteTimesheetsExistToCalculation($data)) {
            //$data format m/Y
            $time = explode('/', $data);
            $workingDay = $this->getWorkingDayInMonth($time[0], $time[1]);
            $salaries = Salary::select('id', 'staff_id', 'amount')->get();
            $input = [];

            foreach ($salaries as $salary) {
                $timesheets = [];
                $timesheetsCode = $salary->staff->code . $time[0] . $time[1];

                if ('active' == $salary->staff->status) {
                    $timesheets['code'] = strval($timesheetsCode);
                    $timesheets['staff_id'] = intval($salary->staff_id);
                    $timesheets['salary_id'] = intval($salary->id);
                    $timesheets['allowance'] = 0;
                    $timesheets['work_day'] = intval($workingDay);
                    $timesheets['advance'] = 0;
                    //Salary calculation formula : 10,5% tiền bảo hiểm do nhân viên đóng
                    $timesheets['received'] = doubleval($this->salaryCalculationFormula($salary->amount, $timesheets['allowance'], $timesheets['advance'], $workingDay, 0, 0));
                    $timesheets['month'] = intval($time[0]);
                    $timesheets['year'] = intval($time[1]);
                    $timesheets['month_leave'] = 0;
                    $timesheets['remaining_leave'] = 0; //Tính lại
                    $timesheets['note'] = 'Lương tháng ' . $data;

                    array_push($input, $timesheets);
                }
            }

            if (Timesheets::insert($input)) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    /**
     * Delete the records that existed before the automatic salary calculation for the month 
     * before the automatic salary calculation for the month 
     */
    function deleteTimesheetsExistToCalculation($time) {
        $time = explode('/', $time);

        try {
            Timesheets::where('month', ltrim($time[0], '0'))->where('year', $time[1])->delete();
            return true;

        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * The first 28 days contain 20 weekdays no matter what. 
     * Have to do is determine the last few days. 
     * Change the start value to 29. Then add 20 weekdays and return value.
     */
    function getWorkingDayInMonth($month, $year) {
        $lastDay = date("t", mktime(0, 0, 0, $month, 1, $year));
        $weekDays = 0;

        for($d = 29; $d <= $lastDay; $d++) {
            $wd = date("w", mktime(0, 0, 0, $month ,$d, $year));
            
            if($wd > 0 && $wd < 6) $weekDays++;
            

        }
        $workingDay = $weekDays + 20;

        return $workingDay;
    }

    function salaryCalculationFormula($salaryAmount, $allowance, $advance, $workingDay, $monthLeave, $remainingLeave) {
        $received = 0;
        //Trường hợp ngày nghỉ phép có lương hoặc không nghỉ phép
        if ((0 == $monthLeave) || ($remainingLeave > $monthLeave)) {
            $received = $salaryAmount + $allowance - $advance - Config::get('app.amount_insurance_staff') * $salaryAmount;
        } else {
            //Trường hợp ngày nghỉ phép không lương
            $unpaidDay = abs($remainingLeave - $remainingLeave);
            $salaryAmount = ($salaryAmount/$workingDay)*($workingDay - $unpaidDay);

            $received = $salaryAmount + $allowance - $advance - Config::get('app.amount_insurance_staff') * $salaryAmount;
        }

        return $received;
    }

    function handleMonthSelection() {
        //Month start calculation
        $start = explode('-', Config::get('app.month_start_calculation'));
        $startMonth = Carbon::create($start[0], $start[1], $start[2], 0);
        $now = Carbon::create(date('Y'), date('m'), 1, 0);

        $diff = $startMonth->diffInMonths($now);

        return $diff;
    }
}