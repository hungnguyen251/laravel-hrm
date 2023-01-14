<?php

namespace App\Services;

use App\Models\AnnualLeave;
use App\Models\Notification;
use App\Models\Salary;
use App\Models\Timesheets;
use App\Models\User;
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
            $month = $time[0];
            $year = $time[1];
            $workingDay = $this->getWorkingDayInMonth($month, $year);
            $salaries = Salary::select('id', 'staff_id', 'amount')->get();
            $input = [];

            foreach ($salaries as $salary) {
                if (!empty($salary->staff)) {
                    $timesheets = [];
                    $timesheetsCode = $salary->staff->code . $month . $year;
                    $remainingLeave = $this->getRemainingLeave($salary->staff->id);
                    $leaveInMonth = $this->caclculateLeave($salary->staff->id, $month, $year);
                    $workingDayActual = $this->caclculateWorkingDay($salary->staff->id, $remainingLeave, $leaveInMonth, $workingDay);
                    $received = $this->salaryCalculationFormula($salary->amount, 0, 0, $workingDay, $leaveInMonth, $remainingLeave);

                    if ('active' == $salary->staff->status) {
                        $timesheets['code'] = strval($timesheetsCode);
                        $timesheets['staff_id'] = intval($salary->staff_id);
                        $timesheets['salary_id'] = intval($salary->id);
                        $timesheets['allowance'] = 0;
                        $timesheets['work_day'] = !empty($workingDayActual) ? doubleval($workingDayActual) : 0;
                        $timesheets['advance'] = 0;
                        //Salary calculation formula : 10,5% tiền bảo hiểm do nhân viên đóng
                        $timesheets['received'] = !empty($received) ? doubleval($received) : 0;
                        $timesheets['month'] = intval($month);
                        $timesheets['year'] = intval($year);
                        $timesheets['month_leave'] = !empty($leaveInMonth) ? doubleval($leaveInMonth) : 0;
                        $timesheets['remaining_leave'] = !empty($remainingLeave) ? doubleval($remainingLeave) : 0;
                        $timesheets['note'] = 'Lương tháng ' . $data;

                        array_push($input, $timesheets);
                    }
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
            
            if($wd > 0 && $wd < 6) {
                $weekDays++;
            }
        }

        $workingDay = $weekDays + 20;

        return $workingDay;
    }

    function salaryCalculationFormula($salaryAmount, $allowance = 0, $advance = 0, $workingDay, $monthLeave, $remainingLeave) {
        $received = 0;
        //Trường hợp ngày nghỉ phép có lương hoặc không nghỉ phép
        if ((0 == $monthLeave) || ($remainingLeave > $monthLeave)) {
            $received = $salaryAmount + $allowance - $advance - Config::get('app.amount_insurance_staff') * $salaryAmount;

        } else {
            //Trường hợp ngày nghỉ phép không lương
            $unpaidDay = abs($remainingLeave - $monthLeave);
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

    function getRemainingLeave($staffId) {
        $leaveNumber = AnnualLeave::select('number')->where('staff_id', $staffId)->first();
        $remainingLeave = 0;

        if (!empty($leaveNumber)) {
            $remainingLeave = $leaveNumber->number;
        } 

        return $remainingLeave;
    }

    function caclculateLeave($staffId, $month, $year) {
        $userId = User::where('staff_id', intval($staffId))->where('status', 'active')->firstOrFail();
        $leaveCalculate = 0;

        if(!is_null($userId)) {
            $noti = Notification::where('user_id', $userId->id)->whereMonth('created_at', strval($month))->whereYear('created_at', strval($year))->get();

            if (!is_null($noti)) {
                foreach($noti as $item) {

                    if ('approve' == strval($item->status)) {
                        
                        if ('Đơn xin nghỉ phép' == $item->title) {
                            //get number of leave
                            $content = strval($item->content);
                            $contentArr = explode(',', $content);
                            $leaveArr = explode(':', $contentArr[2]);
                            $numberLeave = doubleval($leaveArr[1]);
                            $leaveCalculate += $numberLeave;
                        }
                    }
                }
            }
        }

        return $leaveCalculate;
    }

    function caclculateWorkingDay($staffId, $remainingLeave, $leaveCalculate, $workingDay) {
        $diff = $remainingLeave - $leaveCalculate; 
        $workingDayActual = $workingDay;

        if (is_numeric($diff) && $diff > 0) {
            //Recalculate leave days and update data in annual_leave table
            AnnualLeave::where('staff_id', $staffId)->update(['number' => $diff]);

        } else {
            $workingDayActual = $workingDay - abs($diff);

            //Recalculate leave days and update data in annual_leave table  
            AnnualLeave::where('staff_id', $staffId)->update(['number' => 0]);
        }

        return $workingDayActual;
    }
}