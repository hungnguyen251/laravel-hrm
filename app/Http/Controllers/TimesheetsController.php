<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimesheetsRequest;
use App\Services\TimesheetsService;
use Illuminate\Http\Request;

class TimesheetsController extends Controller
{
    protected $timesheets;

    /**
     * Controller constructor.
     *
     * @param  \App\  $timesheets
     */
    public function __construct(TimesheetsService $timesheetsService)
    {
        $this->timesheets = $timesheetsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $timesheets = $this->timesheets->getAllTimesheets($request);

        return view('timesheets.show', compact('timesheets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(TimesheetsRequest $request)
    {
        $this->timesheets->createTimesheets($request->all());

        return redirect()->route('timesheets.index')->with('success', 'Thêm bảng lương thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $staffId)
    {
        $timesheets = $this->timesheets->getTimesheetsByStaffId($staffId);
        
        return view('timesheets.show_id', compact('timesheets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, TimesheetsRequest $request)
    {
        $this->timesheets->updateTimesheetsById($id, $request->all());

        return redirect()->route('timesheets.index')->with('success', 'Cập nhật bảng lương thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->timesheets->deleteTimesheetsById($id);

        return redirect()->route('timesheets.index')->with('success', 'Xóa bảng lương thành công'); 
    }

    /**
     * Edit a timesheets.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $timesheets = $this->timesheets->getTimesheetsById($id);

        return view('timesheets.edit', compact('timesheets'));
    }

    /**
     * Create a timesheets.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('timesheets.create');
    }

    /**
     * automatic salary calculations.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function automaticSalary(Request $request)
    {
        $month = explode('/', $request->salary_month);
        $monthSelected = ltrim($month[0], '0');

        if ($this->timesheets->automaticSalaryCalculation($request->salary_month)) {
            return redirect()->route('timesheets.index',['filter[month]'=> $monthSelected])->with('success', 'Thêm bảng lương tháng ' . $request->salary_month . ' thành công'); 

        } else {
            return redirect()->route('timesheets.index',['filter[month]'=> $monthSelected])->with('failed', 'Đã có lỗi xảy ra khi tạo bảng lương'); 
        }
    }

    /**
     * Month selection.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function monthSelection()
    {
        $times = $this->timesheets->handleMonthSelection();

        return view('timesheets.month_selection', compact('times'));
    }

    /**
     * Manual Calculation View.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function manualView($id)
    {
        $staff = $this->timesheets->getStaffInfo($id);

        return view('timesheets.manual_calculation', compact(['staff']));
    }

    /**
     * Manual salary calculation.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function manualSalaryCalculation(Request $request)
    {
        if($this->timesheets->manualSalaryCalculationById($request->all())) {
            return redirect()->route('timesheets.monthSelection')->with('success', 'Thêm bảng lương tháng ' . $request->month_salary . ' - '. $request->code . ' thành công'); 

        } else {
            return redirect()->route('timesheets.monthSelection')->with('failed', 'Đã có lỗi xảy ra khi tạo bảng lương'); 
        }
    }

    /**
     * Payroll confirmation.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function payrollConfirmation()
    {
        if ($this->timesheets->updateStatusWhenConfirmation()) {
            return redirect()->route('timesheets.index',['filter[month]'=> ltrim(date('m', strtotime('last month')), 0)])->with('success', 'Chốt sổ lương tháng '.date('m/Y', strtotime('last month')).' thành công'); 

        } else {
            return redirect()->route('timesheets.index',['filter[month]'=> ltrim(date('m', strtotime('last month')), 0)])->with('failed', 'Đã có lỗi xảy ra khi chốt sổ lương'); 
        }
    }
}
