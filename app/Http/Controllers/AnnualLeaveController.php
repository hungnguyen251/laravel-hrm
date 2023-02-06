<?php

namespace App\Http\Controllers;

use App\Services\AnnualLeaveService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnnualLeaveController extends Controller
{
    protected $leave;

    /**
     * Controller constructor.
     *
     * @param  \App\  $leave
     */
    public function __construct(AnnualLeaveService $leaveService)
    {
        $this->leave = $leaveService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leave = $this->leave->getAllLeave($request);

        return view('leave.show', compact('leave'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        if($this->leave->createLeave($request->all())) {
            return redirect()->route('leave.index')->with('success', 'Tạo ngày phép thành công');
        } else {
            return redirect()->route('leave.index')->with('failed', 'Tạo ngày phép thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $staffId)
    {
        $leave = $this->leave->getLeaveById($staffId);

        return view('leave.show_id', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {
        // dd($request->all());
        $this->leave->updateLeaveById($id, $request->all());

        return redirect()->route('leave.index')->with('success', 'Cập nhật thông tin thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->leave->deleteLeaveById($id);

        return redirect()->route('leave.index')->with('success', 'Xóa thông tin thành công'); 
    }

    /**
     * Edit a leave.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $leave = $this->leave->getLeaveById($id);

        return view('leave.edit', compact('leave'));
    }

    /**
     * Create a leave.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('leave.create');
    }
}
