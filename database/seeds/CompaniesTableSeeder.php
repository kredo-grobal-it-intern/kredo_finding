<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();

        $faker = Faker::create('en_US');

        for ($i = 501; $i <= 1000; $i++){
            $user = User::Find($i);

            DB::table('companies')->insert([
                'name' => $user->name,
                'user_id' => $user->id,
                'services' => $user->self_introduction,
                'address1' => $user->address1,
                'address2' => $user->address2,
                'city' => $user->city,
                'state' => $user->state,
                'country' => $user->country,
                'zipcode' => $user->zipcode,
                'contact_number' => $user->contact_number,
                'establishment_year' => '2022-04',
                'president_name' => $faker->name,
                'total_personnel' => $faker->numberBetween(5, 10000),
                'capital' => $faker->numberBetween(50000, 10000000000),
                'gross_sales' => $faker->numberBetween(50000, 10000000000),
                'average_age' => $faker->numberBetween(25, 45),
                'homepage_url' => $faker->url,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'password' => $user->password,
                'remember_token' => $user->remember_token,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at
            ]);
        }
    }
}
