<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Services\SemesterService;

class SemesterController extends Controller
{
    
	private $semester;

     /**
     * CustomerController constructor.
     * @param CustomerService $customer
     */
    public function __construct(SemesterService $semester)
    {
        $this->semester = $semester;
    }

    public function index()
    {
        return view('semester.index');
    }

    public function semesterList(){
        $semester = $this->semester->getSemesterForTable();
        return $this->semester->semesterDataTable($semester);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semester.create');
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
            'semester'      =>  'required|string|max:255',
        ]);
        
        //dd($request->all());
        $this->semester->storeSemester($request);
        return redirect(route('admin.semester.index'));
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
        $semester = $this->semester->semesterEdit($id);
        return view('semester.edit',compact('semester'));
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
            'semester'      =>  'required|string|max:255',
        ]);
        $this->semester->updateSemester($request);
        return redirect(route('admin.semester.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->semester->deleteSemester($request->id);
        return redirect(route('admin.semester.index'));
    }




}
