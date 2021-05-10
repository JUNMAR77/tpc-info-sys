<?php

namespace Database\Seeders;
use App\Models\AcadTerm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcadTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acad_terms')->delete();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '202101';
        $acadTerm->sy = '2020-2021';
        $acadTerm->semester = 1;
        $acadTerm->prelims_id = 1;
        $acadTerm->midterms_id = 2;
        $acadTerm->finals_id = 3;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '202102';
        $acadTerm->sy = '2020-2021';
        $acadTerm->semester = 2;
        $acadTerm->prelims_id = 1;
        $acadTerm->midterms_id = 2;
        $acadTerm->finals_id = 3;
        $acadTerm->save();

    }
}
