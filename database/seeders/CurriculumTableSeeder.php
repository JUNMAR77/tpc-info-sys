<?php

namespace Database\Seeders;
use App\Models\Curriculum;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CurriculumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculum')->delete();

        $curriculum = new Curriculum;
        $curriculum->curriculum_id = 2018;
        $curriculum->effective_sy = '2018-2019';
        $curriculum->save();

        $curriculum = new Curriculum;
        $curriculum->curriculum_id = 2019;
        $curriculum->effective_sy = '2019-2020';
        $curriculum->save();

        $curriculum = new Curriculum;
        $curriculum->curriculum_id = 2020;
        $curriculum->effective_sy = '2020-2021';
        $curriculum->save();
    }
}
