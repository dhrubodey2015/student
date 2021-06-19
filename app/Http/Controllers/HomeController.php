<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Services\MarkService;

class HomeController extends Controller

{

    private $mark;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(MarkService $mark)
    {
        $this->mark = $mark;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return view('dashboard');
        } elseif (Auth::check()) {
            $profile = DB::table('customers')->where('user_id', '=', Auth::user()->id)->first();
            

            $semesters = $this->mark->getSemesters();

            return view('customer.profile', compact('profile','semesters'));
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
