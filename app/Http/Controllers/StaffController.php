<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Services\StaffService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StaffController extends Controller
{
    protected $staffs;

    /**
     * Controller constructor.
     *
     * @param  \App\  $staffs
     */
    public function __construct(StaffService $staffService)
    {
        $this->staffs = $staffService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = $this->staffs->getAllStaff();

        return view('staffs.show', compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StaffRequest $request)
    {
        $this->staffs->createStaff($request->all());

        $this->createStaffSalary($request->amount);

        return redirect()->route('staffs.index')->with('success', 'Thêm nhân viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $staff = $this->staffs->getStaffById($id);

        return view('profiles.show', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, StaffRequest $request)
    {
        $this->staffs->updateStaffById($id, $request->all());

        return redirect()->route('staffs.index')->with('success', 'Cập nhật nhân viên thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->staffs->deleteStaffById($id);

        return redirect()->route('staffs.index')->with('success', 'Xóa nhân viên thành công'); 
    }

    /**
     * Edit a staff.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $staff = $this->staffs->getStaffById($id);
        $infoClassification = $this->staffs->getInfoClassification();

        return view('staffs.edit', compact(['staff', 'infoClassification']));
    }

    /**
     * Create a staff.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        $infoClassification = $this->staffs->getInfoClassification();

        return view('staffs.create', compact('infoClassification'));
    }

    /**
     * Create a staff salary.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function createStaffSalary($data)
    {
        return $this->staffs->storeStaffSalary($data);
    }
}


