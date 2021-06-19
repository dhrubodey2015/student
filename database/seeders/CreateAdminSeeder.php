<?php

namespace Database\Seeders;  

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class CreateAdminSeeder extends Seeder
{
    /**

     * Run the database seeds.

     *
     * @return void

     */

    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }

}