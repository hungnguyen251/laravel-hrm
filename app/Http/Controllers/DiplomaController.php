<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiplomaRequest;
use App\Repositories\DiplomaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DiplomaController extends Controller
{
    protected $diplomas;

    /**
     * Controller constructor.
     *
     * @param  \App\  $diplomas
     */
    public function __construct(DiplomaRepository $diplomas)
    {
        $this->diplomas = $diplomas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomas = $this->diplomas->getAll();

        return view('diplomas.show', compact('diplomas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(DiplomaRequest $request)
    {
        $this->diplomas->store($request->all());

        return redirect()->route('diplomas.index')->with('success', 'Thêm bằng cấp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $diploma = $this->diplomas->getById($id);

        return response()->json($diploma, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, diplomaRequest $request)
    {
        $this->diplomas->updateById($id, $request->all());

        return redirect()->route('diplomas.index')->with('success', 'Cập nhật bằng cấp thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->diplomas->deleteById($id);

        return redirect()->route('diplomas.index')->with('success', 'Xóa bằng cấp thành công'); 
    }

    /**
     * Edit a diploma.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $diploma = $this->diplomas->getById($id);

        return view('diplomas.edit', compact('diploma'));
    }

    /**
     * Create a diploma.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('diplomas.create');
    }
}

