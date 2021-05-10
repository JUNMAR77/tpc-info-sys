<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Curriculum;
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

        // Users Table
        $user = new User;
        $user->profile_picture = '042030001.jpg';
        $user->first_name = 'Red';
        $user->middle_name = 'Dober';
        $user->last_name = 'Woof';
        $user->birthdate = '1998-08-06';
        $user->address = 'Tondo, Manila';
        $user->username = '042030001';
        $user->password = Hash::make('042030001');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030001';
        $student->student_type = 'Regular';
        $student->primary = 'Doggy Elementary School';
        $student->primary_sy = '2003-2007';
        $student->intermediate = 'Doggy Elementary School';
        $student->intermediate_sy = '2007-2010';
        $student->secondary = 'Doggy High School';
        $student->secondary_sy = '2010-2015';
    //    $student->curriculum_id = 2021;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030002.jpg';
        $user->first_name = 'Loise';
        $user->middle_name = 'Dela Cruz';
        $user->last_name = 'Ruiz';
        $user->gender = 'F';
        $user->birthdate = '1998-09-16';
        $user->address = 'Baker Street';
        $user->username = '042030002';
        $user->password = Hash::make('042030002');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030002';
        $student->student_type = 'Regular';
        $student->primary = 'All Girls Elementary School';
        $student->primary_sy = '2003-2007';
        $student->intermediate = 'All Girls Elementary School';
        $student->intermediate_sy = '2007-2010';
        $student->secondary = 'All Girls High School';
        $student->secondary_sy = '2010-2015';
    //    $student->curriculum_id = 2021;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030003.jpg';
        $user->first_name = 'Steven';
        $user->middle_name = 'Riox';
        $user->last_name = 'Jackson';
        $user->gender = 'M';
        $user->birthdate = '1998-01-04';
        $user->address = 'Mendiola';
        $user->username = '042030003';
        $user->password = Hash::make('042030003');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030003';
        $student->student_type = 'Regular';
        $student->primary = 'Mendiola Science Elementary School';
        $student->primary_sy = '2003-2007';
        $student->intermediate = 'Mendiola Science Elementary School';
        $student->intermediate_sy = '2007-2010';
        $student->secondary = 'Mendiola Science High School';
        $student->secondary_sy = '2010-2015';
    //    $student->curriculum_id = 2021;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030004.jpg';
        $user->first_name = 'Lea';
        $user->middle_name = 'Mandayaw';
        $user->last_name = 'Santiago';
        $user->gender = 'F';
        $user->birthdate = '1998-02-13';
        $user->address = 'Lacson Blvd';
        $user->username = '042030004';
        $user->password = Hash::make('042030004');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030004';
        $student->student_type = 'Regular';
        $student->primary = 'Lacson Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Lacson Elementary School';
        $student->intermediate_sy = '2008-2010';
        $student->secondary = 'Lacson High School';
        $student->secondary_sy = '2010-2015';
    //    $student->curriculum_id = 2021;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030005.jpg';
        $user->first_name = 'Pea';
        $user->middle_name = 'Bird';
        $user->last_name = 'Rainbow';
        $user->birthdate = '1998-05-27';
        $user->address = 'Lacson Blvd';
        $user->username = '042030005';
        $user->password = Hash::make('042030005');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030005';
        $student->student_type = 'Regular';
        $student->primary = 'Lacson Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Lacson Elementary School';
        $student->intermediate_sy = '2008-2010';
        $student->secondary = 'Lacson High School';
        $student->secondary_sy = '2010-2015';
    //    $student->curriculum_id = 2021;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030006.jpg';
        $user->first_name = 'Rufus';
        $user->middle_name = 'El';
        $user->last_name = 'Dela Cruz';
        $user->birthdate = '1998-05-27';
        $user->address = 'Lacson Blvd';
        $user->username = '042030006';
        $user->password = Hash::make('042030006');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030006';
        $student->student_type = 'Regular';
        $student->primary = 'Lacson Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Lacson Elementary School';
        $student->intermediate_sy = '2008-2010';
        $student->secondary = 'Lacson High School';
        $student->secondary_sy = '2010-2015';
    //    $student->curriculum_id = 2021;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();
    }
}