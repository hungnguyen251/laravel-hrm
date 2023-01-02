<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Repositories\StaffRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StaffController extends Controller
{
    /**
     * Controller constructor.
     *
     * @param  \App\  $staffs
     */
    public function __construct(StaffRepository $staffs)
    {
        $this->staffs = $staffs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StaffRequest $request): JsonResponse
    {
        $staffs = $this->staffs->getAll($request);

        return response()->json($staffs, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StaffRequest $request): JsonResponse
    {
        $staff = $this->staffs->store($request->all());

        return response()->json($staff, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $staff = $this->staffs->getById($id);

        return response()->json($staff, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, int $id): JsonResponse
    {
        $staff = $this->staffs->updateById($id, $request->all());

        return response()->json($staff, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->staffs->deleteById($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}


