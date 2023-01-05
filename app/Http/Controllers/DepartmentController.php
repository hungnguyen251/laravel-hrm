<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    protected $departments;

    /**
     * Controller constructor.
     *
     * @param  \App\  $departments
     */
    public function __construct(DepartmentRepository $departments)
    {
        $this->departments = $departments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departments->getAll();

        return view('departments.show', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(DepartmentRequest $request)
    {
        $this->departments->store($request->all());

        return redirect()->route('departments.index')->with('success', 'Thêm phòng ban thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $department = $this->departments->getById($id);

        return response()->json($department, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, DepartmentRequest $request)
    {
        $this->departments->updateById($id, $request->all());

        return redirect()->route('departments.index')->with('success', 'Cập nhật nhân viên thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->departments->deleteById($id);

        return redirect()->route('departments.index')->with('success', 'Xóa nhân viên thành công'); 
    }

    /**
     * Edit a Department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $department = $this->departments->getById($id);

        return view('departments.edit', compact('department'));
    }

    /**
     * Create a Department.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('departments.create');
    }
}
