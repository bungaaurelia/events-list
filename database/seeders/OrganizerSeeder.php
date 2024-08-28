<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrganizerSeeder extends Seeder
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
            DB::table('organizers')->insert([
                'organizer_name' => $faker->company,
                'contact_email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'website' => $faker->url,
            ]);
        }
    }
}
