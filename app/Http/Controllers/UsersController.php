<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    private $user;

     /**
     * CustomerController constructor.
     * @param CustomerService $customer
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('user.index');
    }

    public function userList(){
        $user = $this->user->getUserForTable();
        return $this->user->userDataTable($user);
    }

//    public function getCustomerPolicy(){
//        $policies = $this->customer->getCustomerPolicy();
//        return $this->customer->customerPolicyDataTable($policies);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$semesters = $this->user->getSemesters();
    	//dd($semesters);
        return view('user.create', compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required|string|max:255',
            //'phone'     =>  'required|numeric',
            'email'     =>  'required|string|email|unique:users|max:255',
            'password'  =>  'required|string|min:8|confirmed|max:255',
            // 'bank_name'  =>  'required',
            // 'bank_ac_no'  =>  'required|numeric',
            // 'bank_ifsc_no'  =>  'required',
        ]);
        
        //dd($request->all());
        $this->user->storeUser($request);
        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->userEdit($id);
        $semesters = $this->user->getSemesters();
        return view('user.edit',compact('user','semesters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'      =>  'required|string|max:255',
            'phone'     =>  'required|numeric',
            //'bank_name'  =>  'required',
            //'bank_ac_no'  =>  'required|numeric',
            //'bank_ifsc_no'  =>  'required',
        ]);
        $data = $request;
        $this->user->updateUser($data);
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->user->deleteUser($request->id);
        return redirect(route('admin.user.index'));
    }



}
