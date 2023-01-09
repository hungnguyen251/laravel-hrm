<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticateUser($attrs)
    {
        $credentials = [
            'email' => $attrs->email,
            'password' => $attrs->password
        ];

        $remember = $attrs->remember;

        if (Auth::attempt($credentials, $remember)) {
            $attrs->session()->regenerate();
            $user = Auth::user();

            if ('active' != $user->status) {
                $this->logout($attrs);

                return false;
            }

            return true;
        }

        return false;
    }

        /**
     * Return login page
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function logout($attrs)
    {
        Auth::guard('users')->logout();
 
        $attrs->session()->invalidate();
    
        $attrs->session()->regenerateToken();

        return true;
    }
}