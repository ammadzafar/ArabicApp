<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout (Request $request)
    {

        session(['remember_email' => Auth::user()->email]);

        Auth::logout();
        return redirect()->route('user.landing.page');
    }
    public function sendLoginResponse()
    {
        $authUser = Auth::user();
        if ($authUser->isAdmin()){
            return redirect('admin/dashboard');
        }
        if ($authUser->isRater()){
            return redirect(route('rater_dashboard'));
        }
        if ($authUser->isStudent()){
            return redirect(route('student_dashboard'));
        }
    }
}
