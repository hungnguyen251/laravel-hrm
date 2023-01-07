<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Return login page
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function logout(Request $request)
    {
        Auth::guard('users')->logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return view('auth.login');
    }

}