<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    protected $companies;

    /**
     * Controller constructor.
     *
     * @param  \App\  $companies
     */
    public function __construct(CompanyService $companiesService)
    {
        $this->companies = $companiesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->companies->getAllCompany();

        return view('companies.show', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(CompanyRequest $request)
    {
        $this->companies->createCompany($request->all());

        return redirect()->route('companies.index')->with('success', 'Thêm phòng ban thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $company = $this->companies->getCompanyById($id);

        return response()->json($company, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, CompanyRequest $request)
    {
        // dd($request->all());
        $this->companies->updateCompanyById($id, $request->all());

        return redirect()->route('companies.index')->with('success', 'Cập nhật thông tin thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->companies->deleteCompanyById($id);

        return redirect()->route('companies.index')->with('success', 'Xóa thông tin thành công'); 
    }

    /**
     * Edit a company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $company = $this->companies->getCompanyById($id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Create a company.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('companies.create');
    }
}
