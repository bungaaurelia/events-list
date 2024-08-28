<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $eventTypes = ['Conference', 'Workshop', 'Seminar', 'Webinar', 'Meetup'];

        foreach ($eventTypes as $type) {
            DB::table('event_types')->insert([
                'event_type_name' => $type,
            ]);
        }
    }
}
