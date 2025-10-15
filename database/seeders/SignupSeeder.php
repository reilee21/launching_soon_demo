<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class SignupSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        // Create 100 contacts with signup logs
        for ($i = 0; $i < 500; $i++) {
            $contactId = DB::table('contacts')->insertGetId([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'ip_address' => $faker->ipv4,
                'country' => $faker->country,
                'region' => $faker->state,
                'city' => $faker->city,
                'created_at' => $faker->dateTimeBetween('-6 months', 'now'),
            ]);

            DB::table('signup_logs')->insert([
                'contact_id' => $contactId,
                'ip_address' => $faker->ipv4,
                'submitted_at' => $faker->dateTimeBetween('-6 months', 'now'),
            ]);
        }
    }
}