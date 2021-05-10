<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('employee')->delete();
        DB::table('students')->delete();

        /*  Admin/OIC
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 1;
        $user->first_name = 'Admin';
        $user->last_name = 'Admin';
        $user->gender = 'M';
        $user->username = 'tpcadmin';
        $user->password = Hash::make('tpcadmin');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('admin', 'hidden super admin');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K200';
        $employee->user_id = 1;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 2;
        $user->profile_picture = 'socrates_macalolot.jpg';
        $user->first_name = 'Socrates';
        $user->middle_name = 'Cuizon';
        $user->last_name = 'Macalolot';
        $user->gender = 'M';
        $user->username = 'admin';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('admin', 'super admin', 'faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K001';
        $employee->user_id = 2;
        $employee->save();

        /*  Head Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 3;
        $user->profile_picture = 'sheryl_cabasag.jpg';
        $user->first_name = 'Sheryl';
        $user->middle_name = 'Escartin';
        $user->last_name = 'Cabasag';
        $user->gender = 'F';
        $user->username = 'K002';
        $user->password = Hash::make('K002');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('head registrar', 'faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K002';
        $employee->user_id = 3;
        $employee->save();

        /* Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 4;
        $user->profile_picture = 'jing_sambalud.jpg';
        $user->first_name = 'Jingle';
        $user->last_name = ' Sambalud';
        $user->gender = 'F';
        $user->username = 'K003';
        $user->password = Hash::make('K003');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K003';
        $employee->user_id = 4;
        $employee->save();

        /* Faculty
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 6;
        $user->profile_picture = 'junmar_sales.jpg';
        $user->first_name = 'Junmar II';
        $user->middle_name = 'Auxtero';
        $user->last_name = 'Sales';
        $user->gender = 'M';
        $user->username = 'TPC002';
        $user->password = Hash::make('TPC002');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K005';
        $employee->user_id = 6;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 7;
        $user->profile_picture = 'neil_evalaroza.jpg';
        $user->first_name = 'Neil';
        $user->last_name = 'Evalaroza';
        $user->gender = 'M';
        $user->username = 'K006';
        $user->password = Hash::make('K006');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K006';
        $employee->user_id = 7;
        $employee->save();

        /* ========================= */

    }
}