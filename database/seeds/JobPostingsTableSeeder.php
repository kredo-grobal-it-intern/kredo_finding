<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobPostingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = Faker::create('en_US');

        for ($i = 1; $i <= 500; $i++){
            DB::table('job_postings')->insert([
                'occupation' => $faker->numberBetween(1, 32),
                'user_id' => $i + 500,
                'company_id' => $i,
                'industry' => $faker->numberBetween(1, 24),
                'employment_status' => $faker->numberBetween(1, 3),
                'job_description' => $faker->realText(400),
                'welcome_requirements' => $faker->realText(400),
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->countryCode,
                'opening_time' => $faker->time(),
                'closing_time' => $faker->time(),
                'salary' => $faker->randomElement([40, 50, 60, 70, 100]),
                'employee_benefits' => $faker->realText(400),
            ]);
        }
    }
}
