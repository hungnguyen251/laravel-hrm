<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Repositories\SalaryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalaryController extends Controller
{
    protected $salaries;

    /**
     * Controller constructor.
     *
     * @param  \App\  $salaries
     */
    public function __construct(SalaryRepository $salaries)
    {
        $this->salaries = $salaries;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salaries = $this->salaries->getAll($request);

        return view('salaries.show', compact('salaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(SalaryRequest $request)
    {
        $this->salaries->store($request->all());

        return redirect()->route('salaries.index')->with('success', 'Thêm tiền lương thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $salary = $this->salaries->getById($id);

        return response()->json($salary, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, salaryRequest $request)
    {
        $this->salaries->updateById($id, $request->all());

        return redirect()->route('salaries.index')->with('success', 'Cập nhật tiền lương thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->salaries->deleteById($id);

        return redirect()->route('salaries.index')->with('success', 'Xóa thành công'); 
    }

    /**
     * Edit a salary.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $salary = $this->salaries->getById($id);

        return view('salaries.edit', compact('salary'));
    }

    /**
     * Create a salary.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('salaries.create');
    }
}
