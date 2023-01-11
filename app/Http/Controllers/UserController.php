<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $users;

    /**
     * Controller constructor.
     *
     * @param  \App\  $users
     */
    public function __construct(UserService $userService)
    {
        $this->users = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->users->getAllUser($request);

        return view('users.show', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(UserRequest $request)
    {
        $this->users->createUser($request->all());

        return redirect()->route('users.index')->with('success', 'Thêm tài khoản thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $user = $this->users->getUserById($id);

        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, UserRequest $request)
    {
        $this->users->updateUserById($id, $request->all());

        return redirect()->route('users.index')->with('success', 'Cập nhật tài khoản thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->users->deleteUserById($id);

        return redirect()->route('users.index')->with('success', 'Xóa tài khoản thành công'); 
    }

    /**
     * Edit a User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $user = $this->users->getUserById($id);

        return view('users.edit', compact(['user']));
    }

    /**
     * Create a User.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('users.create');
    }
}