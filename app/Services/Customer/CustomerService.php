<?php


namespace App\Services\Customer;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * Class CustomerService
 * @package App\Services\Customer
 */
class CustomerService
{
    public function storeCustomer($data)
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('customers')
            ->insert([
                'user_id' => $user->id,
                'phone' => $data->phone,
                'address' => $data->address,
                'bank_name' => $data->bank_name,
                'bank_ac_no' => $data->bank_ac_no,
                'bank_ifsc_code' => $data->bank_ifsc_no,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCustomerForTable()
    {
        $customers = DB::table('users')
            ->orderBy('users.updated_at', 'desc')
            //->join('customers', 'users.id', 'customers.user_id')
            ->select(
                'users.id',
                'users.name',
                //'customers.phone',
                'users.email',
                //'customers.address',
                //'customers.bank_name',
                //'customers.bank_ac_no',
                //'customers.bank_ifsc_code'
            )
            ->get();
        return $customers;
    }

    /**
     * @param $customers
     * @return mixed
     * @throws \Exception
     */
    public function customerDataTable($customers)
    {
        return DataTables::of($customers)
            ->addColumn('name', function ($customer) {
                return $customer->name;
            })->addColumn('phone', function ($customer) {
                return $customer->phone;
            })->addColumn('email', function ($customer) {
                return $customer->email;
            })->addColumn('address', function ($customer) {
                return $customer->address;
            })->addColumn('bank_name', function ($customer) {
                return $customer->bank_name;
            })->addColumn('bank_ac_no', function ($customer) {
                return $customer->bank_ac_no;
            })->addColumn('bank_ifsc_code', function ($customer) {
                return $customer->bank_ifsc_code;
            })->addColumn('action', function ($customer) {
                return '<a href="' . route('admin.customer.edit', ['id' => $customer->id]) . '" type="button" class="btn btn-sm btn-icon btn-warning">
                            <i class="la la-edit"></i>
                        </a>
                        <button onclick="deleteUser('.$customer->id.')" type="button" class="btn btn-sm btn-icon btn-danger">
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

    public function customerEdit($id)
    {
        $customer = DB::table('users')
            ->where('users.id', $id)
            ->join('customers', 'users.id', 'customers.user_id')
            ->select(
                'users.id',
                'users.name',
                'customers.phone',
                'users.email',
                'users.password',
                'customers.address',
                'customers.bank_name',
                'customers.bank_ac_no',
                'customers.bank_ifsc_code')
            ->first();
        return $customer;
    }

    public function updateCustomer($customer)
    {
        DB::table('users')
            ->where('id', $customer->id)
            ->update([
                'name' => $customer->name,
                'updated_at' => Carbon::now()
            ]);
        DB::table('customers')
            ->where('user_id',$customer->id)
            ->update([
                'phone' => $customer->phone,
                'address' => $customer->address,
                'bank_name' => $customer->bank_name,
                'bank_ac_no' => $customer->bank_ac_no,
                'bank_ifsc_code' => $customer->bank_ifsc_no,
                'updated_at' => Carbon::now()
            ]);
            if(!empty($customer->password)){
               DB::table('users') 
                    ->where('id',$customer->id)
                    ->update([
                        'password' => Hash::make($customer->password),
                        'updated_at' => Carbon::now()
            ]);
            }
    }

    /**
     * @param $id
     */
    public function deleteCustomer($id)
    {
        DB::table('users')->where('id', $id)->delete();
        DB::table('customers')->where('user_id', $id)->delete();
    }

}
