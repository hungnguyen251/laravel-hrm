<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $auth;

    /**
     * Controller constructor.
     *
     */
    public function __construct(AuthService $authService)
    {
        $this->auth = $authService;
    }

    /**
     * Return login page
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->auth->authenticateUser($request)) {
            $user = Auth::user();
            return redirect()->route('staffs.show',['id' => $user->id]);

        } else {
            return back()->withErrors([
                'failed' => 'Email đăng nhập hoặc mật khẩu không đúng',
            ])->onlyInput('authFailed');
        }
    }

    /**
     * Return login page
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function destroy(Request $request)
    {
        $this->auth->logout($request);

        return view('auth.login');
    }
}