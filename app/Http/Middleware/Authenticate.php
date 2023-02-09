<?php

namespace App\Http\Middleware;

use App\Models\AnnualLeave;
use App\Models\Notification;
use App\Models\Salary;
use App\Models\Staff;
use App\Models\Timesheets;
use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Support\Facades\Auth as Authen;

class Authenticate extends Middleware
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $role1 = null, $role2 = null, $role3 = null)
    {
        if (Authen::check()) {
            $user = app('auth')->user();
            
            if ('active' != $user->status) {
                app('auth')->logout();
                throw new UnauthorizedException();
            }

            if ('super_admin' != $user->decentralization && $role1 != null && $role1 != $user->decentralization 
                && ($role2 == null || $role2 != $user->decentralization)
                && ($role3 == null || $role3 != $user->decentralization)) {
                throw new UnauthorizedException();
            }

            //Check the user's id or staff's id, then access by user's id (staff's id)
            if('staff' == $user->decentralization) {
                $prefix = explode('/', $request->path());
                
                if (count($prefix) > 1) {
                    if ('users' == $prefix[0] && is_numeric($prefix[2])) {
                        $userCheck = User::find($prefix[2]);
                        if ($userCheck != null && $user->id != $userCheck->id) {
                            throw new UnauthorizedException();
                        }
                    }

                    if ('staffs' == $prefix[0] && is_numeric($prefix[2])) {
                        $staff = Staff::find($prefix[2]);
                        if ($staff != null && $user->staff_id != $staff->id) {
                            throw new UnauthorizedException();
                        }
                    }

                    if ('notifications' == $prefix[0] && is_numeric($prefix[2])) {
                        $notification = Notification::find($prefix[2]);
                        if ($notification != null && $user->id != $notification->user_id) {
                            throw new UnauthorizedException();
                        }
                    }

                    if ('salaries' == $prefix[0] && is_numeric($prefix[2])) {
                        $salary = Salary::find($prefix[2]);
                        if ($salary != null && $user->staff_id != $salary->staff_id) {
                            throw new UnauthorizedException();
                        }
                    }

                    if ('timesheets' == $prefix[0] && is_numeric($prefix[2])) {
                        $timesheets = Timesheets::find($prefix[2]);
                        if ($timesheets != null && $user->staff_id != $timesheets->staff_id) {
                            throw new UnauthorizedException();
                        }
                    }

                    if ('leave' == $prefix[0] && is_numeric($prefix[2])) {
                        $leave = AnnualLeave::find($prefix[2]);
                        if ($leave != null && $user->staff_id != $leave->staff_id) {
                            throw new UnauthorizedException();
                        }
                    }
                }
            }

            return $next($request);
        } else {
            return response()->view('forms.navigation');
        }
    }
}
