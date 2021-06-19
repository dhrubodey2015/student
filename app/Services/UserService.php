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
class UserService
{
    public function storeUser($data)
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'mobile' => $data->phone,
            'gender' => $data->gender,
            'semester_id' => $data->semester_id,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUserForTable()
    {
        $users = DB::table('users')
            ->orderBy('users.updated_at', 'desc')
            //->join('customers', 'users.id', 'customers.user_id')
            ->select(
                'users.id',
                'users.name',
                'users.mobile',
                //'customers.phone',
                'users.email',
                //'customers.address',
                //'customers.bank_name',
                //'customers.bank_ac_no',
                //'customers.bank_ifsc_code'
            );
        return $users;
    }

    /**
     * @param $customers
     * @return mixed
     * @throws \Exception
     */
    public function userDataTable($users)
    {
        return DataTables::of($users)
            ->addColumn('name', function ($user) {
                return $user->name;
            })->addColumn('mobile', function ($user) {
                return $user->mobile;
            })->addColumn('email', function ($user) {
                return $user->email;
            })->addColumn('action', function ($user) {
                //
                return '<a href="' . route('admin.user.edit', ['id' => $user->id]) . '" type="button" class="btn btn-sm btn-icon btn-warning"><i class="la la-edit"></i></a><button onclick="deleteUser('.$user->id.')" type="button" class="btn btn-sm btn-icon btn-danger">
                            <i class="la la-trash"></i>
                        </button>';
            })
            ->escapeColumns('action')
            ->make(true);
    }

//    public function getCustomerPolicy(){
//        $policy = DB::table('policies_generates')
//            ->where('policies_generates.policy_holder', '=', Auth::user()->id)
//            ->leftJoin('schemes', 'policies_generates.policy_name', '=', 'schemes.id')
//            ->select('policies_generates.*', 'schemes.name', 'schemes.identifier', 'schemes.interest_rate', 'schemes.tenure', 'schemes.min_limit_investment', 'schemes.max_limit_investment');
//
//        return $policy;
//    }
//
//    public function customerPolicyDataTable($policies){
//        return DataTables::of($policies)
//        ->addColumn('name', function ($policy) {
//            return $policy->name;
//        })->addColumn('identifier', function ($policy) {
//            return $policy->identifier;
//        })->addColumn('interest_rate', function ($policy) {
//            return $policy->interest_rate;
//        })->addColumn('generation_date', function ($policy) {
//            return $policy->generation_date;
//        })->addColumn('payment_date', function ($policy) {
//            return $policy->payment_date;
//        })->addColumn('expiry_date', function ($policy) {
//            return $policy->expiry_date;
//        })->addColumn('certificate', function ($policy) {
//                return '<a href="' . route('certificate.download', ['id' => $policy->id]) . '" type="button" class="btn btn-sm btn-icon btn-warning">
//                            <i class="la la-download"></i>
//                        </a>';
//        })->escapeColumns('action')
//            ->make(true);
//    }

    public function userEdit($id)
    {
        $user = DB::table('users')
            ->where('users.id', $id)
            ->join('semesters', 'users.semester_id', 'semesters.id')
            ->select(
                'users.id',
                'users.name',
                'users.mobile',
                'users.email',
                'users.password',
                'users.gender',
                'users.semester_id',
                //'customers.address',
                //'customers.bank_name',
                //'customers.bank_ac_no',
                //'customers.bank_ifsc_code'
            )
            ->first();
        return $user;
    }

    public function updateUser($user)
    {
        DB::table('users')
            ->where('id', $user->id)
            ->update([ 
                'name' => $user->name,
                'mobile' => $user->phone,
                //'email' => $user->email,
                'gender' => $user->gender,
                'semester_id' => $user->semester_id,
                'updated_at' => Carbon::now()
            ]);

            if(!empty($user->password)){
               DB::table('users') 
                    ->where('id',$user->id)
                    ->update([
                        'password' => Hash::make($user->password),
                        'updated_at' => Carbon::now()
            ]);
            }
    }

    /**
     * @param $id
     */
    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        //DB::table('customers')->where('user_id', $id)->delete();
    }

    public function getSemesters()
    {
        return Semester::all();
        
    }
}
