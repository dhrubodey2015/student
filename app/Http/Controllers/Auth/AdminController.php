<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('auth.admin_login');
    }

    public function adminLoginCheck(Request $request)
    {
        // $request->validate([
        //     'email'     =>  'required|email|exists:admins',
        //     'password'  =>  'required|string',
        // ]);
        // $messages = [
        //     'email.exists' => 'These credentials do not match our records.',
        // ];
        // if (Auth::attempt(array('email' => $request->username, 'password' => $request->password))){
        //     return "success";
        // }else{
        //     return "Wrong Credentials";
        // }
        // die;
        
        // dd($model);
        // dd($request->password);
        // $password = Hash::make($request->password);
        
        // if ($model = DB::table('admins')->where('email', $request->email)->first()) {
        //     if (Hash::check($request->password, $model->password, [])) {
        //         return view('dashboard');
               
        //     } else {
        //         return redirect()->back()->with('These credentials do not match our records.');
        //     }
        // } else {
        //     return redirect()->back()->with('These credentials do not match our records.');
        // }
        $request->validate([
            'email'   => 'required|email|exists:admins',
            'password' => 'required|string'
        ]);
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        // dd($request->all());
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // echo('Hello !');
            // die;
            // return view('dashboard');
            return redirect(route('home'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

}
