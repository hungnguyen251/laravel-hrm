<?php

namespace App\Http\Controllers;

use App\Http\Requests\RewardRequest;
use App\Repositories\RewardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RewardController extends Controller
{
    protected $rewards;

    /**
     * Controller constructor.
     *
     * @param  \App\  $rewards
     */
    public function __construct(RewardRepository $rewards)
    {
        $this->rewards = $rewards;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rewards = $this->rewards->getAll();

        return view('rewards.show', compact('rewards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(RewardRequest $request)
    {
        $this->rewards->store($request->all());

        return redirect()->route('rewards.index')->with('success', 'Thêm giải thưởng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $reward = $this->rewards->getById($id);

        return response()->json($reward, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, RewardRequest $request)
    {
        $this->rewards->updateById($id, $request->all());

        return redirect()->route('rewards.index')->with('success', 'Cập nhật giải thưởng thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rewards->deleteById($id);

        return redirect()->route('rewards.index')->with('success', 'Xóa giải thưởng thành công'); 
    }

    /**
     * Edit a rewards.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $reward = $this->rewards->getById($id);

        return view('rewards.edit', compact('reward'));
    }

    /**
     * Create a rewards.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('rewards.create');
    }
}
