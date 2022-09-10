<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'self_introduction' => $faker->realText(300),
        'address1' => $faker->streetName,
        'address2' => 'hoge',
        'name' => $faker->name,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->countryCode,
        'zipcode' => $faker->postcode,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('password123'),
        'remember_token' => Str::random(10),
        'contact_number' => $faker->phoneNumber,
    ];
});

$factory->state(User::class, 'Worker', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'user_type' => 0,
        'gender' => $faker->boolean,
        'company_name' => $faker->company,
        'preferred_state' => $faker->state,
        'preferred_country' => $faker->countryCode,
        'occupation' => $faker->numberBetween(1, 32),
        'tenureship' => $faker->numberBetween(1, 10),
        'job_position' => $faker->numberBetween(1, 9),
        'preferred_employment_status' => $faker->numberBetween(1, 3),
        'job_skills' => $faker->realText(50),
        'job_experiences' => $faker->realText(200),
    ];
});

$factory->state(User::class, 'Company', function (Faker $faker) {
    return [
        'name' => $faker->company,
        'user_type' => 1,
    ];
});
