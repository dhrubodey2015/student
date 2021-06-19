<?php


namespace App\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\Mark;
use App\Models\User;
/**
 * Class CustomerService
 * @package App\Services\Customer
 */
class MarkService
{
    public function storeMark($data)
    {
        $user = Mark::create([
            'subject_id' => $data->subject_id,
            'user_id' => $data->user_id,
            'marks' => $data->marks,
            'marks_status' => $data->marks_status,
            'semester_id' => $data->semester_id,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getMarkForTable()
    {
                            
        $marks = DB::table('marks')
            ->orderBy('marks.updated_at', 'desc')
            ->join('users', 'marks.user_id', 'users.id')
            ->join('semesters', 'marks.semester_id', 'semesters.id')
            ->join('subjects', 'marks.subject_id', 'subjects.id')
            ->select(
                'marks.id',
                'marks.user_id',
                'marks.semester_id',
                'marks.subject_id',
                'marks.marks',
                'marks.marks_status',
                'users.name',
                'semesters.semester',
                'subjects.subject'

            );
        return $marks;
    }

    /**
     * @param $customers
     * @return mixed
     * @throws \Exception
     */
    public function markDataTable($marks)
    {
        return DataTables::of($marks)
            ->addColumn('student', function ($mark) {
                return $mark->name;
            })->addColumn('semster', function ($mark) {
                return $mark->name;
            })->addColumn('subject', function ($mark) {
                return $mark->subject;
            })->addColumn('marks', function ($mark) {
                return $mark->marks;
            })->addColumn('status', function ($mark) {
                return $mark->marks_status;
            })->addColumn('action', function ($mark) {
                //
                return '<a href="' . route('admin.marks.edit', ['id' => $mark->id]) . '" type="button" class="btn btn-sm btn-icon btn-warning"><i class="la la-edit"></i></a><button onclick="deleteMark('.$mark->id.')" type="button" class="btn btn-sm btn-icon btn-danger">
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

    public function getUsers()
    {
        return User::all();
        
    }

    public function getSubjects()
    {
        return Subject::all();
        
    }




}
