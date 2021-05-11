<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            EventsTableSeeder::class,
            AcadTermsTableSeeder::class,
            Course2021TableSeeder::class,
            CurriculumTableSeeder::class,
            EventsTableSeeder::class,  
		//	CurriculumDetails2021TableSeeder::class,
		//	Prerequisite2021TableSeeder::class,
            SettingsTableSeeder::class,
            UsersTableSeeder::class,
         //   ActivityTableSeeder::class,
            PostsTableSeeder::class
        ]);
    }
}
