<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authUser = Auth::user();

        if ($authUser->isAdmin()){
            return redirect('admin/dashboard');
        }
        if ($authUser->isStudent()){
            return redirect(route('student_dashboard'));
        }
        if ($authUser->isRater()){
            return redirect(route('rater_dashboard'));
        }
    }
}
