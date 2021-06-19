<?php


namespace App\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\Subject;
use App\Models\Semester;
/**
 * Class CustomerService
 * @package App\Services\Customer
 */
class SubjectService
{
    public function storeSubject($data)
    {
        $user = Subject::create([
            'subject' => $data->subject,
            'full_marks' => $data->full_marks,
            'passing_marks' => $data->passing_marks,
            'semester_id' => $data->semester_id,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSubjectForTable()
    {

                            
        $subjects = DB::table('subjects')
            ->orderBy('subjects.updated_at', 'desc')
            ->join('semesters', 'subjects.semester_id', 'semesters.id')
            ->select(
                'subjects.id',
                'subjects.subject',
                'subjects.full_marks',
                'subjects.passing_marks',
                'subjects.semester_id',
                'semesters.semester'
            );
        return $subjects;
    }

    /**
     * @param $customers
     * @return mixed
     * @throws \Exception
     */
    public function subjectDataTable($subjects)
    {
        return DataTables::of($subjects)
            ->addColumn('semester', function ($subject) {
                return $subject->semester;
            })->addColumn('subject', function ($subject) {
                return $subject->subject;
            })->addColumn('full_marks', function ($subject) {
                return $subject->full_marks;
            })->addColumn('passing_marks', function ($subject) {
                return $subject->passing_marks;
            })->addColumn('action', function ($subject) {
                //
                return '<a href="' . route('admin.subject.edit', ['id' => $subject->id]) . '" type="button" class="btn btn-sm btn-icon btn-warning"><i class="la la-edit"></i></a><button onclick="deleteSubject('.$subject->id.')" type="button" class="btn btn-sm btn-icon btn-danger">
                            <i class="la la-trash"></i>
                        </button>';
            })
            ->escapeColumns('action')
            ->make(true);
    }


    public function subjectEdit($id)
    {
        $subject = DB::table('subjects')
            ->where('subjects.id', $id)
            ->join('semesters', 'subjects.semester_id', 'semesters.id')
            ->select(
                'subjects.id',
                'subjects.subject',
                'subjects.full_marks',
                'subjects.passing_marks',
                'subjects.semester_id',
                'semesters.semester'
            )
            ->first();
        return $subject;
    }

    public function updateSubject($subject)
    {
        DB::table('subjects')
            ->where('id', $subject->id)
            ->update([ 
                'subject' => $subject->subject,
                'full_marks' => $subject->full_marks,
                'passing_marks' => $subject->passing_marks,
                'semester_id' => $subject->semester_id,
                'updated_at' => Carbon::now()
            ]);
    }

    /**
     * @param $id
     */
    public function deleteSubject($id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        //DB::table('customers')->where('user_id', $id)->delete();
    }

    public function getSemesters()
    {
        return Semester::all();
        
    }
}
