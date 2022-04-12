<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role_id){
            case 2:
                $this->redirectTo = '/staff/home';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/hod/home';
                return $this->redirectTo;
                break;
            case 4:
                $this->redirectTo = '/bm/home';
                return $this->redirectTo;
                break;
            case 5:
                $this->redirectTo = '/hr/home';
                return $this->redirectTo;
                break;
            case 6:
                $this->redirectTo = '/gm/home';
                return $this->redirectTo;
                break;
            case 7:
                $this->redirectTo = '/ceo/home';
                return $this->redirectTo;
                break;
            case 1:
                $this->redirectTo = '/admin/home';         
                return $this->redirectTo;
                break;
            //the rest cases
            default:
                $this->redirectTo = '/';
                return $this->redirectTo;
        }
    }

    

    // public function showLoginForm()
    // {
    //     abort('404');
    // }
    
    public function login(\Illuminate\Http\Request $request) {
        $this->validateLogin($request);
    
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
    
        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
    
            // Make sure the user is active
            if ($user->active && $this->attemptLogin($request)) {
                // Send the normal successful login response
                return $this->sendLoginResponse($request);
            } else {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['active' => 'This account is not active.']);
            }
        }
    
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
    
        return $this->sendFailedLoginResponse($request);
    }

    
}
