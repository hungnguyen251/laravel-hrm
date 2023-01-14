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
    public function show(int $id)
    {
        $timesheets = $this->timesheets->getTimesheetsById($id);

        return view('profiles.show', compact('timesheets'));
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
        
        if ($this->timesheets->automaticSalaryCalculation($request->salary_month)) {
            return redirect()->route('timesheets.index',['filter[month]'=> $month[0]])->with('success', 'Thêm bảng lương tháng ' . $request->salary_month . ' thành công'); 

        } else {
            return redirect()->route('timesheets.index',['filter[month]'=> $month[0]])->with('failed', 'Đã có lỗi xảy ra khi tạo bảng lương'); 
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
}
