<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mark;
use App\Services\MarkService;

class MarkController extends Controller
{
     private $mark;

     /**
     * CustomerController constructor.
     * @param CustomerService $customer
     */
    public function __construct(MarkService $mark)
    {
        $this->mark = $mark;
    }

    public function index()
    {
        return view('mark.index');
    }

    public function marksList(){
        $mark = $this->mark->getmarkForTable();
        return $this->mark->markDataTable($mark);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$semesters = $this->mark->getSemesters();
    	$users = $this->mark->getUsers();
    	$subjects = $this->mark->getSubjects();
    	//dd($semesters);
        return view('mark.create', compact('semesters','users','subjects'));
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
            'semester_id'      =>  'required|string|max:255',
        ]);
        
        //dd($request->all());
        $this->mark->storeMark($request);
        return redirect(route('admin.marks.index'));
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
        $subject = $this->subject->subjectEdit($id);
        $semesters = $this->subject->getSemesters();
        return view('subject.edit',compact('subject','semesters'));
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
            'subject'      =>  'required|string|max:255',
        ]);
        $data = $request;
        $this->subject->updateSubject($data);
        return redirect(route('admin.subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->subject->deleteSubject($request->id);
        return redirect(route('admin.subject.index'));
    }
}
