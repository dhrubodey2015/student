<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Services\SubjectService;

class SubjectController extends Controller
{
    private $subject;

     /**
     * CustomerController constructor.
     * @param CustomerService $customer
     */
    public function __construct(SubjectService $subject)
    {
        $this->subject = $subject;
    }

    public function index()
    {
        return view('subject.index');
    }

    public function subjectList(){
        $subject = $this->subject->getSubjectForTable();
        return $this->subject->subjectDataTable($subject);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$semesters = $this->subject->getSemesters();
    	//dd($semesters);
        return view('subject.create', compact('semesters'));
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
            'subject'      =>  'required|string|max:255',
        ]);
        
        //dd($request->all());
        $this->subject->storeSubject($request);
        return redirect(route('admin.subject.index'));
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
