<?php

namespace Database\Seeders;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $setting = new Setting;
        $setting->name = 'Degree';
        $setting->value = 'Bachelor of Science in Information Systems';
        $setting->save();

        $setting = new Setting;
        $setting->name = 'Current Acad Term';
        $setting->value = '202101';
        $setting->save();

        $setting = new Setting;
        $setting->name = 'Current Curriculum';
        $setting->value = '2021';
        $setting->save();

        $setting = new Setting;
        $setting->name = 'Announcement';
        $setting->value = 'For new enrollees on November, please go to the registrar\'s office at 1PM onwards.';
        $setting->save();
    }
}
