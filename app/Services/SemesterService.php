<?php


namespace App\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Semester;
/**
 * Class CustomerService
 * @package App\Services\Customer
 */
class SemesterService
{
    public function storeSemester($data)
    {
        $user = Semester::create([
            'semester' => $data->semester,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSemesterForTable()
    {
        $semesters = DB::table('semesters')
            ->orderBy('semesters.updated_at', 'desc')
            //->join('customers', 'users.id', 'customers.user_id')
            ->select(
                'semesters.id',
                'semesters.semester',
            );
        return $semesters;
    }

    /**
     * @param $customers
     * @return mixed
     * @throws \Exception
     */
    public function semesterDataTable($semesters)
    {
        return DataTables::of($semesters)
            ->addColumn('id', function ($semester) {
                return $semester->id;
            })->addColumn('semester', function ($semester) {
                return $semester->semester;
            })->addColumn('action', function ($semester) {
                //
                return '<a href="' . route('admin.semester.edit', ['id' => $semester->id]) . '" type="button" class="btn btn-sm btn-icon btn-warning"><i class="la la-edit"></i></a><button onclick="deleteSemester('.$semester->id.')" type="button" class="btn btn-sm btn-icon btn-danger">
                            <i class="la la-trash"></i>
                        </button>';
            })
            ->escapeColumns('action')
            ->make(true);
    }



    public function semesterEdit($id)
    {
        $semester = DB::table('semesters')
            ->where('semesters.id', $id)
            ->select(
                'semesters.id',
                'semesters.semester'
            )
            ->first();
        return $semester;
    }

    public function updateSemester($semester)
    {
        DB::table('semesters')
            ->where('id', $semester->id)
            ->update([ 
                'semester' => $semester->semester,
                'updated_at' => Carbon::now()
            ]);
    }

    /**
     * @param $id
     */
    public function deleteSemester($id)
    {
        DB::table('semesters')->where('id', $id)->delete();
    }

    public function getSemesters()
    {
        return Semester::all();
        
    }
}
