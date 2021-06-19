<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;

/**
 * Class CustomerController
 * @package App\Http\Controllers\Customer
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    private $customer;

     /**
     * CustomerController constructor.
     * @param CustomerService $customer
     */
    public function __construct(CustomerService $customer)
    {
        $this->customer = $customer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    public function customerList(){
        $customers = $this->customer->getCustomerForTable();
        return $this->customer->customerDataTable($customers);
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
        return view('customer.create');
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
            'phone'     =>  'required|numeric',
            'email'     =>  'required|string|email|unique:users|max:255',
            'password'  =>  'required|string|min:8|confirmed|max:255',
            'bank_name'  =>  'required',
            'bank_ac_no'  =>  'required|numeric',
            'bank_ifsc_no'  =>  'required',
        ]);
        $datas = $request;
        $this->customer->storeCustomer($datas);
        return redirect(route('admin.customer.index'));
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
        $customer = $this->customer->customerEdit($id);
        return view('customer.edit',compact('customer'));
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
            'bank_name'  =>  'required',
            'bank_ac_no'  =>  'required|numeric',
            'bank_ifsc_no'  =>  'required',
        ]);
        $data = $request;
        $this->customer->updateCustomer($data);
        return redirect(route('admin.customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->customer->deleteCustomer($request->id);
        return redirect(route('admin.customer.index'));
    }

}
