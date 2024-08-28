<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('events')->insert([
                'event_name' => $faker->sentence,
                'event_date' => $faker->date,
                'event_time' => $faker->time,
                'organizer_id' => $faker->numberBetween(1, 10), // Ensure this matches existing organizer IDs
                'description' => $faker->paragraph,
                'event_type_id' => $faker->numberBetween(1, 5), // Ensure this matches existing event type IDs
            ]);
        }
    }
}
