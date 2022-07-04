<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('companies')->insert([
            [   
                'name' => 'Google',
                'email' => 'company1@example.com',
                'services' => 'We are Google',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Apple',
                'email' => 'company2@example.com',
                'services' => 'We are Apple',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'The Walt Disney Company',
                'email' => 'company3@example.com',
                'services' => 'We are The Walt Disney Company',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'Amazon',
                'email' => 'company4@example.com',
                'services' => 'We are Amazon',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'Nike',
                'email' => 'company5@example.com',
                'services' => 'We are Nike',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'J.P. Morgan',
                'email' => 'company6@example.com',
                'services' => 'We are J.P. Morgan',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'Netflix',
                'email' => 'company7@example.com',
                'services' => 'We are Netflix',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'Tesla',
                'email' => 'company8@example.com',
                'services' => 'We are Tesla',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'Goldman Sachs',
                'email' => 'company9@example.com',
                'services' => 'We are Goldman Sachs',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
            [   
                'name' => 'Spotify',
                'email' => 'company10@example.com',
                'services' => 'We are Spotify',
                'img_name' => NULL,
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
