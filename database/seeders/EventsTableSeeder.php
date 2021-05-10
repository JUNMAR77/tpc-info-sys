<?php

namespace Database\Seeders;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        $event = new Event;
        $event->event_id = 1;
        $event->title = 'Prelims Examination';
        $event->start_date = '2021-07-29';
        $event->end_date = '2021-08-03';
        $event->save();

        $event = new Event;
        $event->event_id = 2;
        $event->title = 'Midterms Examination';
        $event->start_date = '2021-09-10';
        $event->end_date = '2021-09-14';
        $event->save();

        $event = new Event;
        $event->event_id = 3;
        $event->title = 'Finals Examination';
        $event->start_date = '2021-10-21';
        $event->end_date = '2021-10-25';
        $event->save();

        $event = new Event;
        $event->event_id = 4;
        $event->title = 'Foundation Week';
        $event->start_date = '2021-10-14';
        $event->end_date = '2021-10-18';
        $event->save();

        $event = new Event;
        $event->event_id = 5;
        $event->title = 'Submission of Grades';
        $event->start_date = '2021-10-26';
        $event->end_date = '2021-10-30';
        $event->save();
    }
}
