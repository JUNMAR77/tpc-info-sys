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
            AcadTermsTableSeeder::class,
			CurriculumTableSeeder::class,
            Course2021TableSeeder::class,
            EventsTableSeeder::class,  
            SettingsTableSeeder::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
        ]);
    }
}
