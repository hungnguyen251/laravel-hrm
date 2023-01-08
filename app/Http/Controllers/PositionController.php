<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Repositories\PositionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PositionController extends Controller
{
    protected $positions;

    /**
     * Controller constructor.
     *
     * @param  \App\  $positions
     */
    public function __construct(PositionRepository $positions)
    {
        $this->positions = $positions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = $this->positions->getAll();

        return view('positions.show', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(PositionRequest $request)
    {
        $this->positions->store($request->all());

        return redirect()->route('positions.index')->with('success', 'Thêm chức danh thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $position = $this->positions->getById($id);

        return response()->json($position, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, PositionRequest $request)
    {
        $this->positions->updateById($id, $request->all());

        return redirect()->route('positions.index')->with('success', 'Cập nhật chức danh thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->positions->deleteById($id);

        return redirect()->route('positions.index')->with('success', 'Xóa chức danh thành công'); 
    }

    /**
     * Edit a position.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $position = $this->positions->getById($id);

        return view('positions.edit', compact('position'));
    }

    /**
     * Create a position.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('positions.create');
    }
}
